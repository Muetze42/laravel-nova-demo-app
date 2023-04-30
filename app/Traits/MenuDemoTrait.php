<?php

namespace App\Traits;

use App\Nova\Resources\Menu;
use App\Nova\Resources\Menu1;
use App\Nova\Resources\Menu2;
use App\Nova\Resources\Menu3;
use App\Nova\Resources\Menu4;
use App\Nova\Resources\Menu5;
use App\Nova\Resources\Menu6;
use NormanHuth\NovaMenu\MenuCard;
use NormanHuth\NovaMenu\MenuItem;
use NormanHuth\NovaMenu\MenuSection;

trait MenuDemoTrait
{
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
}
