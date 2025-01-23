<?php declare(strict_types=1);

namespace Containers\Positions\Tasks;

use Containers\Positions\Constants\Position;
use Containers\Positions\Dto\ChessboardDto;
use Containers\Positions\Dto\FigureDto;
use Containers\Positions\Dto\SquareDto;
use Framework\Task;

class ParsePositionTask extends Task
{
    public function run(string $position): ChessboardDto
    {
        $filledSquares = array_flip(str_split($position));

        $squares = [];
        foreach (Position::SCUARES_CODES as $squareIndex => $squareCode) {
            $figureIndex = $filledSquares[$squareCode] ?? null;

            $figure = isset($figureIndex) ? new FigureDto([
                'index' => $figureIndex,
            ]) : null;

            $squares[] = new SquareDto([
                'index' => $squareIndex,
                'figure' => $figure,
            ]);
        }

        return new ChessboardDto([
            'squares' => $squares,
        ]);
    }
}