<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Containers\Positions\Tasks\ParsePositionTask;
use Containers\Positions\Constants\Position;

final class ParsePositionTaskTest extends TestCase
{
    public function testSuccess(): void
    {
        /** @var ParsePositionTask $task */
        $task = app(ParsePositionTask::class);

        foreach ($this->generateRandomPositions() as $position) {
            $chessboard = $task->run($position);

            $this->assertCount(64, $chessboard->squares);

            foreach ($chessboard->squares as $square) {
                $this->assertIsInt($square->index);
                $this->assertGreaterThanOrEqual(0, $square->index);
                $this->assertLessThanOrEqual(63, $square->index);

                if (!empty($figure = $square->figure)) {
                    $this->assertIsInt($figure->index);
                    $this->assertGreaterThanOrEqual(0, $figure->index);
                    $this->assertLessThanOrEqual(31, $figure->index);
                }
            }
        }
    }

    /**
     * @return string[]
     */
    protected function generateRandomPositions(): array
    {
        $positions = [];

        $characters = Position::SCUARES_CODES;
        $characters[] = Position::EATEN_CODE;

        foreach (range(1, 10) as $i) {
            shuffle($characters);

            $positions[] = implode('', array_slice($characters, 0, 32));
        }

        return $positions;
    }
}