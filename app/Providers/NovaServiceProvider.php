<?php

namespace App\Providers;

use App\Traits\MenuDemoTrait;
use Laravel\Nova\Menu\Menu;
use NormanHuth\NovaMenu\MenuCard;
use NormanHuth\NovaMenu\MenuDisclosure;
use NormanHuth\NovaMenu\MenuGroup;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuSection;
use NormanHuth\NovaMenu\Services\MenuFilter;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Http\Request;
use Laravel\Nova\Actions\ActionEvent;
use App\Nova\Resources\NormanHuthFontAwesomeField;
use App\Nova\Resources\NormanHuthPrismJs;
use App\Nova\Resources\NovaRadioFieldRadio;
use NormanHuth\NovaMenu\UnfilteredMainMenu;
use NormanHuth\NovaPerspectives\Menu\PerspectiveDisclosure;
use NormanHuth\NovaPerspectives\Menu\PerspektiveSelect;
use NormanHuth\NovaPerspectives\PerspectiveHelper;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    use MenuDemoTrait;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        UnfilteredMainMenu::over(function (Request $request) {
            return [
                PerspektiveSelect::make('PerspektiveSelect'),
                MenuCard::make('info')
                    ->content('You select the „'.data_get(PerspectiveHelper::options(), $request->input('viaPerspective')).'“ perspective.')
                    ->addClasses(['text-center'])
                    ->rounded()
            ];
        });

        Nova::userMenu(function (Request $request, Menu $menu) {
            $menu->append(
                PerspectiveDisclosure::make('PerspectiveDisclosure'),
            );
            $menu->append(
                MenuDisclosure::make(__('MenuDisclosure'), [
                    MenuItem::make(
                        'My Profile Link 1',
                        "/resources/users/{$request->user()->getKey()}"
                    ),
                    MenuItem::make(
                        'My Profile Link 2',
                        "/resources/users/{$request->user()->getKey()}"
                    ),
                    MenuItem::make(
                        'My Profile Link 3',
                        "/resources/users/{$request->user()->getKey()}"
                    ),
                ])->faIcon('fa-brands fa-laravel'),
            );

            return $menu;
        });

        parent::boot();
        $this->footer();
        $this->menu();
        ActionEvent::saving(function ($actionEvent) {
            return false;
        });
        MenuFilter::activate('both');
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
