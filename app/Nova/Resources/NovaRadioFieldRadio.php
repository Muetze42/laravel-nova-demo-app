<?php

namespace App\Nova\Resources;

use App\Nova\Actions\RadioAction;
use App\Nova\Actions\RadioInlineAction;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NormanHuth\NovaRadioField\Radio;

class NovaRadioFieldRadio extends Resource
{
    /**
     * The column by which to sort as default
     *
     * @var string
     */
    public static string $defaultSort = 'id';

    /**
     * Sort ascending or descending as default
     *
     * @var string
     */
    public static string $defaultOrder = 'asc';

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
        if ($this->getKey() == 2) {
            return $this->selectDependsOnRadion();
        }

        if ($this->getKey() == 3) {
            return $this->radioDependsOnSelect();
        }

        if ($this->getKey() == 4) {
            return $this->changeRadioDependsOnSelect();
        }

        return [
            Text::make(__('Type'), function () {
                return 'Radio example';
            }),

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
                ->addLabelStyles(['width' => '15rem'])
                ->hideFromIndex(),
        ];
    }

    /**
     * @return array
     */
    protected function selectDependsOnRadion(): array
    {
        return [
            Text::make(__('Type'), function () {
                return 'Select depends on Radio example';
            }),

            Radio::make(__('Radio'), 'select')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ]),

            Select::make('select2')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ])
                ->hide()
                ->dependsOn(
                    ['select'],
                    function (Select $field, NovaRequest $request, FormData $formData) {
                        if ($formData->select === 'M') {
                            $field->show();
                        }
                    }
                ),
        ];
    }

    /**
     * @return array
     */
    protected function radioDependsOnSelect(): array
    {
        return [
            Text::make(__('Type'), function () {
                return 'Radio depends on Select example';
            }),

            Select::make('select2')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ]),

            Radio::make(__('Radio'), 'select')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ])
                ->hide()
                ->dependsOn(
                    ['select2'],
                    function (Radio $field, NovaRequest $request, FormData $formData) {
                        if ($formData->select2 === 'M') {
                            $field->show();
                        }
                    }
                ),
        ];
    }

    /**
     * @return array
     */
    protected function changeRadioDependsOnSelect(): array
    {
        return [
            Text::make(__('Type'), function () {
                return 'Change Radio depends on Select example';
            }),

            Select::make('select2')
                ->options([
                    'S' => __('Simple'),
                    'W' => __('With help texts'),
                ])->default('S'),

            Radio::make(__('Radio'), 'select')
                ->options([
                    'S' => __('Small'),
                    'M' => __('Medium'),
                    'L' => __('Large'),
                ])
                ->dependsOn(
                    ['select2'],
                    function (Radio $field, NovaRequest $request, FormData $formData) {
                        if ($formData->select2 === 'W') {
                            $field->radioHelpTexts([
                                'S' => __('Select small size'),
                                'M' => __('Select medium size'),
                                'L' => __('Select large size'),
                            ]);
                        }
                    }
                ),
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
        return [
            new RadioAction(),
            (new RadioInlineAction())->showInline(),
        ];
    }
}
