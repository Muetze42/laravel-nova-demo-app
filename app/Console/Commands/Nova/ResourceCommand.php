<?php

namespace App\Console\Commands\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Console\ResourceCommand as Command;

class ResourceCommand extends Command
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Nova\Resources';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        $stub = str_replace(['{{ plural }}', '{{plural}}'], Str::plural($class), $stub);
        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);
    }

    /**
     * Get the base resource class.
     *
     * @return class-string
     */
    protected function getBaseResourceClass(): string
    {
        $rootNamespace = $this->laravel->getNamespace();

        return "{$rootNamespace}Nova\Resources\Resource";
    }
}
