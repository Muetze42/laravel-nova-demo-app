<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ReadOnlyTrait
{
    /**
     * Is the Model writeable.
     *
     * @var bool
     */
    protected static bool $writeable = false;

    /**
     * Determine if this Model is writeable.
     *
     * @param bool $writeable
     * @return static
     */
    public static function writable(bool $writeable = true): static
    {
        static::$writeable = $writeable;

        return new static();
    }

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = []): bool
    {
        if (static::$writeable) {
            return Model::save($options);
        }

        return true;
    }
}
