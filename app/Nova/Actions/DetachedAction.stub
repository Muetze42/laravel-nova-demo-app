<?php

namespace App\Nova\Actions;

use Illuminate\Support\Collection;
use Laravel\Nova\Actions\ActionResponse;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use NormanHuth\NovaDetachedActions\DetachedAction as Action;

class DetachedAction extends Action
{
    /**
     * Perform the action on the given models.
     */
    public function handle(ActionFields $fields, Collection $models): ActionResponse|Action
    {
        return Action::openInNewTab('https://github.com/Muetze42/nova-detached-actions');
    }

    /**
     * Get the fields available on the action.
     */
    public function fields(NovaRequest $request): array
    {
        return [];
    }
}
