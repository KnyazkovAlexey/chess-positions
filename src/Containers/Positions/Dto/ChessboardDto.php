<?php declare(strict_types=1);

namespace Containers\Positions\Dto;

use Framework\Dto;

class ChessboardDto extends Dto
{
    /** @var SquareDto[] $scuares */
    public array $squares;
}