<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf Component.
 */

namespace HyperfComponent\Jwt;

use Carbon\Carbon;

class Utils
{
    /**
     * Get the Carbon instance for the current time.
     */
    public static function now(): Carbon
    {
        return Carbon::now('UTC');
    }

    /**
     * Get the Carbon instance for the timestamp.
     */
    public static function timestamp(int $timestamp): Carbon
    {
        return Carbon::createFromTimestampUTC($timestamp)->timezone('UTC');
    }

    /**
     * Checks if a timestamp is in the past.
     */
    public static function isPast(int $timestamp, int $leeway = 0): bool
    {
        $timestamp = static::timestamp($timestamp);

        return $leeway > 0
            ? $timestamp->addSeconds($leeway)->isPast()
            : $timestamp->isPast();
    }

    /**
     * Checks if a timestamp is in the future.
     */
    public static function isFuture(int $timestamp, int $leeway = 0): bool
    {
        $timestamp = static::timestamp($timestamp);

        return $leeway > 0
            ? $timestamp->subSeconds($leeway)->isFuture()
            : $timestamp->isFuture();
    }
}
