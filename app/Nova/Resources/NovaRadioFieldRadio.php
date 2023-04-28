<?php

namespace App\Nova\Resources;

use Laravel\Nova\Http\Requests\NovaRequest;
use NormanHuth\NovaRadioField\Radio;

class NovaRadioFieldRadio extends Resource
{
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        return 'Radio';
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \App\Models\NovaRadioFieldRadio::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
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
                ])
                ->radioHelpTexts([
                    'S' => __('Select small size'),
                    'L' => __('Select large size'),
                ]),

            Radio::make(__('Radio'), 'select2')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ])->inline()->help('Help Text'),

            Radio::make(__('Radio'), 'select3')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                    'E' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam'),
                    'G' => __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam'),
                ])
                ->radioHelpTexts([
                    'S' => __('Select small size'),
                    'L' => __('Select large size'),
                ])
                ->gap(4)
                ->inline()
                ->addLabelStyles(['width' => '15rem']),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
