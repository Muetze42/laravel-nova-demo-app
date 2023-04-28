<?php

namespace App\Console\Commands\Nova;

use Laravel\Nova\Console\BaseResourceCommand as Command;

class BaseResourceCommand extends Command
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
}
