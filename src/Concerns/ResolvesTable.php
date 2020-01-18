<?php

namespace MatthiasWilbrink\TableResolver\Concerns;

use Illuminate\Database\Eloquent\Model;
use MatthiasWilbrink\TableResolver\Exceptions\NotAModelException;

/**
 * Trait ResolvesTable
 * @package MatthiasWilbrink\TableResolver
 *
 */
trait ResolvesTable
{
    /**
     * Get the (default) table associated with the model.
     *
     * @return string
     * @throws NotAModelException
     */
    public static function resolveTable()
    {
        if (!is_subclass_of(static::class, Model::class)) {
            throw new NotAModelException();
        }

        return (new static())->getTable();
    }
}
