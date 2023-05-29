<?php

namespace App\Nova\Perspectives;

use Illuminate\Http\Request;
use NormanHuth\NovaPerspectives\Perspective;

class ContentPerspective extends Perspective
{
    /**
     * The perspective priority to order.
     *
     * @var int
     */
    public int $priority = 10;

    /**
     * Override Nova menus.
     *
     * @param Request $request
     * @return void
     */
    public function novaMenus(Request $request): void
    {
        //$this->mainMenu(function (Request $request) {});
        //$this->userMenu(function (Request $request) {});

        /* Functions for https://github.com/Muetze42/nova-menu V 1.7 or newer */
        //$this->mainMenuUnfilteredTop(function (Request $request) {});
        //$this->mainMenuUnfilteredBottom(function (Request $request) {});
    }

    /**
     * The icons for JSON serialization.
     *
     * @var array
     */
    protected array $icons = [
        'fontawesome' => 'fa-solid fa-file-lines',
        'heroicon' => null,
        'image' => null,
        'html' => null,
        'height' => 18,
    ];

    /**
     * The perspective label.
     *
     * @param Request $request
     * @return string
     */
    public function label(Request $request): string
    {
        return __('Content');
    }

    /**
     * Determine if the filter or action should be available for the given request.
     *
     * @param Request $request
     * @return bool
     */
    public function authorizedToSee(Request $request): bool
    {
        return true;
    }

    /**
     * Custom perspective slug.
     *
     * @var string|null
     */
    public ?string $perspectiveSlug = null;
}
