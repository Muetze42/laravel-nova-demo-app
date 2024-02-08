<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ReadOnlyTrait
{
    /**
     * Is the Model writeable.
     */
    protected static bool $writeable = false;

    /**
     * Determine if this Model is writeable.
     */
    public static function writable(bool $writeable = true): static
    {
        static::$writeable = $writeable;

        return new static();
    }

    /**
     * Save the model to the database.
     */
    public function save(array $options = []): bool
    {
        if (static::$writeable) {
            return Model::save($options);
        }

        return true;
    }

    /**
     * Save the model to the database.
     */
    public function saveQuietly(array $options = []): bool
    {
        if (static::$writeable) {
            return Model::saveQuietly($options);
        }

        return true;
    }

    /**
     * Delete the model from the database.
     */
    public function delete(array $options = []): bool
    {
        if (static::$writeable) {
            return Model::delete($options);
        }

        return true;
    }
}
