<?php declare(strict_types=1);

namespace Containers\Positions\Tasks;

use Containers\Positions\Enums\FigureState;
use Containers\Positions\Dto\ChessboardDto;
use Containers\Positions\Dto\FigureDto;
use Containers\Positions\Dto\SquareDto;
use Framework\Task;

class ParsePositionTask extends Task
{
    /**
     * @param string $position
     * @return ChessboardDto
     */
    public function run(string $position): ChessboardDto
    {
        $filledSquares = array_flip(str_split($position));

        $squares = [];
        foreach (FigureState::getSquaresStates() as $squareIndex => $squareCode) {
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