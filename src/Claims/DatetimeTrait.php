<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt\Claims;

use DateInterval;
use DateTimeInterface;
use HyperfComponent\Jwt\Exceptions\InvalidClaimException;
use HyperfComponent\Jwt\Utils;

trait DatetimeTrait
{
    /**
     * Time leeway in seconds.
     */
    protected int $leeway = 0;

    /**
     * Set the claim value, and call a validate method.
     *
     * @param mixed $value
     *
     * @return $this
     * @throws InvalidClaimException
     */
    public function setValue($value)
    {
        if ($value instanceof DateInterval) {
            $value = Utils::now()->add($value);
        }

        if ($value instanceof DateTimeInterface) {
            $value = $value->getTimestamp();
        }

        return parent::setValue($value);
    }

    public function validateCreate($value): mixed
    {
        if (! is_numeric($value)) {
            throw new InvalidClaimException($this);
        }

        return $value;
    }

    /**
     * Set the leeway in seconds.
     *
     * @return $this
     */
    public function setLeeway(int $leeway)
    {
        $this->leeway = $leeway;

        return $this;
    }

    /**
     * Determine whether the value is in the future.
     *
     * @param mixed $value
     */
    protected function isFuture($value): bool
    {
        return Utils::isFuture((int) $value, (int) $this->leeway);
    }

    /**
     * Determine whether the value is in the past.
     *
     * @param mixed $value
     */
    protected function isPast($value): bool
    {
        return Utils::isPast((int) $value, (int) $this->leeway);
    }
}
