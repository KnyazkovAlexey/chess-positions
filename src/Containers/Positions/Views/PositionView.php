<?php declare(strict_types=1);

namespace Containers\Positions\Views;

use Framework\View;
use Containers\Positions\Constants\Figure;

class PositionView extends View
{
    protected const array FIGURES_SYMBOLS = [
        Figure::INDEX_WHITE_ROOK_1 => '♖',
        Figure::INDEX_WHITE_KNIGHT_1 => '♘',
        Figure::INDEX_WHITE_BISHOP_1 => '♗',
        Figure::INDEX_WHITE_QUEEN => '♕',
        Figure::INDEX_WHITE_KING => '♔',
        Figure::INDEX_WHITE_BISHOP_2 => '♗',
        Figure::INDEX_WHITE_KNIGHT_2 => '♘',
        Figure::INDEX_WHITE_ROOK_2 => '♖',
        Figure::INDEX_WHITE_PAWN_1 => '♙',
        Figure::INDEX_WHITE_PAWN_2 => '♙',
        Figure::INDEX_WHITE_PAWN_3 => '♙',
        Figure::INDEX_WHITE_PAWN_4 => '♙',
        Figure::INDEX_WHITE_PAWN_5 => '♙',
        Figure::INDEX_WHITE_PAWN_6 => '♙',
        Figure::INDEX_WHITE_PAWN_7 => '♙',
        Figure::INDEX_WHITE_PAWN_8 => '♙',
        Figure::INDEX_BLACK_ROOK_1 => '♜',
        Figure::INDEX_BLACK_KNIGHT_1 => '♞',
        Figure::INDEX_BLACK_BISHOP_1 => '♝',
        Figure::INDEX_BLACK_QUEEN => '♛',
        Figure::INDEX_BLACK_KING => '♚',
        Figure::INDEX_BLACK_BISHOP_2 => '♝',
        Figure::INDEX_BLACK_KNIGHT_2 => '♞',
        Figure::INDEX_BLACK_ROOK_2 => '♜',
        Figure::INDEX_BLACK_PAWN_1 => '♟',
        Figure::INDEX_BLACK_PAWN_2 => '♟',
        Figure::INDEX_BLACK_PAWN_3 => '♟',
        Figure::INDEX_BLACK_PAWN_4 => '♟',
        Figure::INDEX_BLACK_PAWN_5 => '♟',
        Figure::INDEX_BLACK_PAWN_6 => '♟',
        Figure::INDEX_BLACK_PAWN_7 => '♟',
        Figure::INDEX_BLACK_PAWN_8 => '♟',
    ];

    protected const EMPTY_SQUARE_SYMBOL = ' ';

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