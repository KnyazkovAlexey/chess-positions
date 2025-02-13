<?php declare(strict_types=1);

namespace Containers\Positions\Views;

use Framework\View;
use Containers\Positions\Enums\FigureIndex;

class PositionView extends View
{
    protected const array FIGURES_SYMBOLS = [
        FigureIndex::WHITE_ROOK_1->value => '♖',
        FigureIndex::WHITE_KNIGHT_1->value => '♘',
        FigureIndex::WHITE_BISHOP_1->value => '♗',
        FigureIndex::WHITE_QUEEN->value => '♕',
        FigureIndex::WHITE_KING->value => '♔',
        FigureIndex::WHITE_BISHOP_2->value => '♗',
        FigureIndex::WHITE_KNIGHT_2->value => '♘',
        FigureIndex::WHITE_ROOK_2->value => '♖',
        FigureIndex::WHITE_PAWN_1->value => '♙',
        FigureIndex::WHITE_PAWN_2->value => '♙',
        FigureIndex::WHITE_PAWN_3->value => '♙',
        FigureIndex::WHITE_PAWN_4->value => '♙',
        FigureIndex::WHITE_PAWN_5->value => '♙',
        FigureIndex::WHITE_PAWN_6->value => '♙',
        FigureIndex::WHITE_PAWN_7->value => '♙',
        FigureIndex::WHITE_PAWN_8->value => '♙',
        FigureIndex::BLACK_ROOK_1->value => '♜',
        FigureIndex::BLACK_KNIGHT_1->value => '♞',
        FigureIndex::BLACK_BISHOP_1->value => '♝',
        FigureIndex::BLACK_QUEEN->value => '♛',
        FigureIndex::BLACK_KING->value => '♚',
        FigureIndex::BLACK_BISHOP_2->value => '♝',
        FigureIndex::BLACK_KNIGHT_2->value => '♞',
        FigureIndex::BLACK_ROOK_2->value => '♜',
        FigureIndex::BLACK_PAWN_1->value => '♟',
        FigureIndex::BLACK_PAWN_2->value => '♟',
        FigureIndex::BLACK_PAWN_3->value => '♟',
        FigureIndex::BLACK_PAWN_4->value => '♟',
        FigureIndex::BLACK_PAWN_5->value => '♟',
        FigureIndex::BLACK_PAWN_6->value => '♟',
        FigureIndex::BLACK_PAWN_7->value => '♟',
        FigureIndex::BLACK_PAWN_8->value => '♟',
    ];

    protected const EMPTY_SQUARE_SYMBOL = ' ';

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $result = '';

        foreach ($params['chessboard']->squares as $squareIndex => $square) {
            if ($squareIndex % 8 === 0) {
                $result .= PHP_EOL;
            }

            $figure = $square->figure;

            $result .= !empty($figure) ? static::FIGURES_SYMBOLS[$figure->index] : static::EMPTY_SQUARE_SYMBOL;
        }

        return $result;
    }
}