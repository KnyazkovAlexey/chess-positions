<?php declare(strict_types=1);

namespace Framework;

use PDO;

class Db
{
    protected PDO $dbh;

    public function __construct()
    {
        //todo: config class
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $database = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        $dsn = "mysql:host={$host};port={$port};dbname={$database}";

        $this->dbh = new PDO($dsn, $username, $password);

        //todo: error handling
    }

    public function execute(string $sql, array $data = []): bool
    {
        $sth = $this->dbh->prepare($sql);

        $result = $sth->execute($data);

        //todo: error handling

        return $result;
    }

    public function query(string $sql, array $data = [], ?string $className = null)
    {
        $sth = $this->dbh->prepare($sql);

        $sth->execute($data);

        //todo: error handling

        if (!empty($className)) {
            return $sth->fetchAll(PDO::FETCH_CLASS, $className);
        } else {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}