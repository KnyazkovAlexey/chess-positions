<?php declare(strict_types=1);

namespace Containers\Positions\Models;

use Framework\Entity;

/**
 * @property int|null $id
 * @property string|null $position
 */
class PositionEntity extends Entity
{
    protected ?int $id = null;

    protected ?string $position = null;
}