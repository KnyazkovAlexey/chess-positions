<?php declare(strict_types=1);

namespace Containers\Positions\Dto;

use Framework\Dto;

class GetPositionResponseDto extends Dto
{
    public ChessboardDto $chessboard;
}