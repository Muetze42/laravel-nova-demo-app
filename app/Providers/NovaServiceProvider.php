<?php

namespace App\Providers;

use App\Nova\Resources\NormanHuthFontAwesomeField;
use App\Nova\Resources\NormanHuthPrismJs;
use App\Nova\Resources\NovaRadioFieldRadio;
use App\Nova\Resources\Menu;
use App\Nova\Resources\Menu1;
use App\Nova\Resources\Menu2;
use App\Nova\Resources\Menu3;
use App\Nova\Resources\Menu4;
use App\Nova\Resources\Menu5;
use App\Nova\Resources\Menu6;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Http\Request;
use NormanHuth\NovaMenu\MenuCard;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuSection;
use Laravel\Nova\Actions\ActionEvent;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Set the fields menu in main menu for Nova.
     *
     * @return array
     */
    protected function fieldsMenu(): array
    {
        return [
            /**
             * Fields by Norman Huth.
             */
            MenuGroup::make('Norman Huth', [
                MenuItem::resource(NovaRadioFieldRadio::class),
                MenuItem::resource(NormanHuthFontAwesomeField::class),
                MenuItem::resource(NormanHuthPrismJs::class),
            ])->collapsable(),

            /**
             * Menu Demo
             */
        ];
    }

    /**
     * Set the main menu for Nova.
     *
     * @return void
     */
    protected function menu(): void
    {
        Nova::mainMenu(function (Request $request) {
            return array_merge([
                /**
                 * Laravel Nova fields.
                 */
                MenuSection::make('Fields', $this->fieldsMenu())->collapsable(),
            ], $this->menuDemo());
        });
    }

    protected function menuDemo(): array
    {
        return [
            MenuCard::make()->content('<div class="font-semibold text-center border rounded p-1 dark:border-gray-700">„Nova Menu Advanced“ Demo</div>'),

            MenuSection::iframe('Open Iframe', 'https://huth.it')
                ->faIcon('fa-solid fa-window-restore'),

            MenuSection::make('Fleet', [
                MenuItem::resource(Menu::class)
                    ->faIcon('fa-solid fa-car')
                    ->asLabel()
                    ->iconClasses('fa-fw'),
                MenuItem::resource(Menu1::class)
                    ->faIcon('fa-solid fa-id-card')
                    ->asLabel()
                    ->iconClasses('fa-fw'),
                MenuItem::resource(Menu2::class)
                    ->faIcon('fa-solid fa-industry')
                    ->asLabel()
                    ->iconClasses('fa-fw'),
                MenuItem::resource(Menu3::class)
                    ->faIcon('fa-solid fa-wrench')
                    ->asLabel()
                    ->iconClasses('fa-fw'),
            ])->imageIcon(asset('assets/pngwing.com.png'))->collapsable(),

            MenuSection::make('Customers', [
                MenuItem::resource(Menu4::class)
                    ->faIcon('fa-solid fa-file-import')
                    ->iconClasses(['fa-fw', 'customers']),
                MenuItem::resource(Menu5::class)
                    ->faIcon('fa-solid fa-file-invoice-dollar')
                    ->iconClasses(['fa-fw', 'customers']),
                MenuItem::resource(Menu6::class)
                    ->faIcon('fa-solid fa-user')
                    ->iconClasses(['fa-fw', 'customers']),
            ])->faIcon('fa-solid fa-users')->collapsable(),

            MenuCard::make()
                ->view('info-box', [
                    'name' => 'Nova Menu Advanced.',
                    'url' => 'https://github.com/Muetze42/nova-menu',
                    'vendor' => 'norman-huth/nova-menu',
                    'package' => 'nova-menu',
                ]),
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
        $this->footer();
        $this->menu();
        ActionEvent::saving(function ($actionEvent) {
            return false;
        });
    }

    /**
     * Set the footer text used for Nova.
     *
     * @return void
     */
    protected function footer(): void
    {
        Nova::footer(function (Request $request) {
            $footer = '<div class="bg-red-100 text-red-600 dark:bg-red-300 dark:text-red-900 p-2 rounded font-semibold text-lg text-center mx-auto w-full max-w-lg"><p>This is a „Laravel Nova Demo App“.</p><p>No changes will be saved.</p></div>';
            $footer .= '<div class="text-center" style="padding-bottom: 2rem"><a href="https://github.com/Muetze42/laravel-nova-demo-app" target="_blank" class="link-default mx-auto text-lg">Source Code</a></div>';
            $footer .= '<div>'.str_replace('<a', ' <a target="blank"', Nova::defaultFooter($request)).'</div>';

            return $footer;
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards(): array
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools(): array
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
