<?php declare(strict_types=1);

namespace Framework;

abstract class Repository
{
    protected string $tableName;

    protected string $entityClass;

    protected Db $db;

    public function __construct()
    {
        $this->db = app(Db::class);
    }

    public function findById(int $id): ?Entity
    {
        $result = $this->db->query(
            'SELECT * FROM ' . $this->tableName . ' WHERE id=:id',
            [
                ':id' => $id,
            ],
            $this->entityClass,
        );

        return $result[0] ?? null;
    }
}