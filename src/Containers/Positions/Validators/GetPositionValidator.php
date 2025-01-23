<?php declare(strict_types=1);

namespace Containers\Positions\Validators;

use Framework\Validator;

class GetPositionValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function validate(array $params = []): bool
    {
        return $this->validateId($params['id'] ?? null);
    }

    /**
     * @param mixed $id
     * @return bool
     */
    protected function validateId(mixed $id): bool
    {
        return is_int($id) || (is_string($id) && preg_match('/^\d+$/', $id));
    }
}