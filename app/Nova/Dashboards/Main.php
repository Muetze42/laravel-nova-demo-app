<?php

namespace App\Nova\Dashboards;

use App\Nova\Resources\CardUser;
use Laravel\Nova\Dashboards\Main as Dashboard;
use NormanHuth\NovaResourceCard\NovaResourceCard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards(): array
    {
        return [
            new NovaResourceCard(CardUser::class),
        ];
    }
}
