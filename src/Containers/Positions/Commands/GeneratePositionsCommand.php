<?php declare(strict_types=1);

namespace Containers\Positions\Commands;

use Framework\Console\Command;
use Framework\Console\Request;
use Framework\Db;

class GeneratePositionsCommand extends Command
{
    protected Db $db;

    public function __construct()
    {
        $this->db = app(Db::class);
    }

    /**
     * @inheritdoc
     */
    public function run(Request $request): void
    {
        $this->createTable();
        $this->clearTable();
        $this->fillTable();
        $this->outputRows();
    }

    protected function createTable(): void
    {
        $sql = '
            CREATE TABLE IF NOT EXISTS positions (
                id INT AUTO_INCREMENT PRIMARY KEY,
                position CHAR(32)
            )
        ';

        $this->db->execute($sql);

        $this->write('Table created');
    }

    protected function clearTable(): void
    {
        $sql = 'DELETE FROM positions';

        $this->db->execute($sql);

        $this->write('Table cleared');
    }

    protected function fillTable(): void
    {
        $positions = [
            '0123456789AaBbCcTtUuVvWwXxYyZz?!',
            '...0.......................!....',
        ];

        $placeholders = implode(',', array_fill(0, count($positions), '(?)'));
        $sql ="INSERT INTO positions (position) VALUES {$placeholders}";

        $this->db->execute($sql, $positions);

        $this->write('Table filled');
    }

    protected function outputRows(): void
    {
        $rows = $this->db->query('SELECT * FROM positions');

        $this->write('Table data:');

        foreach ($rows as $row) {
            $this->write($row['id'] . '. ' . $row['position']);
        }
    }
}