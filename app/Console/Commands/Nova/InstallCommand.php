<?php

namespace App\Console\Commands\Nova;

use Laravel\Nova\Console\InstallCommand as Command;

class InstallCommand extends Command
{
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        /** @noinspection DuplicatedCode */
        $this->comment('Publishing Nova Assets / Resources...');
        $this->callSilent('nova:publish');

        $this->comment('Publishing Nova Service Provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'nova-provider']);

        $this->comment('Generating Main Dashboard...');
        $this->callSilent('nova:dashboard', ['name' => 'Main']);
        copy($this->resolveStubPath('/stubs/nova/main-dashboard.stub'), app_path('Nova/Dashboards/Main.php'));

        $this->installNovaServiceProvider();

        $this->comment('Generating User Resource...');
        $this->callSilent('nova:resource', ['name' => 'User']);
        copy($this->resolveStubPath('/stubs/nova/user-resource.stub'), app_path('Nova/Resources/User.php'));

        if (file_exists(app_path('Models/User.php'))) {
            file_put_contents(
                app_path('Nova/Resources/User.php'),
                str_replace('App\User::class', 'App\Models\User::class', file_get_contents(app_path('Nova/Resources/User.php')))
            );
        }

        $this->setAppNamespace();

        $this->info('Nova scaffolding installed successfully.');
    }

    /**
     * Set the proper application namespace on the installed files.
     *
     * @return void
     */
    protected function setAppNamespace(): void
    {
        $namespace = $this->laravel->getNamespace();

        $this->setAppNamespaceOn(app_path('Nova/Resources/User.php'), $namespace);
        $this->setAppNamespaceOn(app_path('Providers/NovaServiceProvider.php'), $namespace);
    }
}
