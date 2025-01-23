<?php declare(strict_types=1);

namespace Containers\Positions\Repositories;

use Framework\Repository;
use Containers\Positions\Models\PositionEntity;

class PositionRepository extends Repository
{
    protected string $tableName = 'positions';

    protected string $entityClass = PositionEntity::class;
}