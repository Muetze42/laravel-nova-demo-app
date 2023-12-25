<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Actions\ActionResponse;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use NormanHuth\NovaRadioField\Radio;

class RadioInlineAction extends Action
{
    use InteractsWithQueue;
    use Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param Collection   $models
     *
     * @return ActionResponse
     */
    public function handle(ActionFields $fields, Collection $models): ActionResponse
    {
        return Action::message('It worked!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param NovaRequest $request
     *
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Radio::make(__('Radio'), 'select')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ]),
        ];
    }
}
