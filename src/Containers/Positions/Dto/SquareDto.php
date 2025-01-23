<?php declare(strict_types=1);

namespace Containers\Positions\Dto;

use Framework\Dto;

class SquareDto extends Dto
{
    public int $index;
    public ?FigureDto $figure;
}