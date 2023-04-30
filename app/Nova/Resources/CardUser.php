<?php

namespace App\Nova\Resources;

use Illuminate\Http\Request;

class CardUser extends User
{
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        return __('Newest Users');
    }

    /**
     * The pagination per-page options configured for this resource.
     *
     * @return array
     */
    public static $perPageOptions = [5];

    /**
     * Determine if the current user can delete the given resource.
     *
     * @param Request $request
     * @return bool
     */
    public function authorizedToDelete(Request $request): bool
    {
        return false;
    }

    /**
     * Determine if the current user can restore the given resource.
     *
     * @param Request $request
     * @return bool
     */
    public function authorizedToRestore(Request $request): bool
    {
        return false;
    }

    /**
     * Determine if the current user can update the given resource.
     *
     * @param Request $request
     * @return bool
     */
    public function authorizedToUpdate(Request $request): bool
    {
        return false;
    }

    /**
     * Determine if the current user can force delete the given resource.
     *
     * @param Request $request
     * @return bool
     */
    public function authorizedToForceDelete(Request $request): bool
    {
        return false;
    }

    /**
     * Determine if the current user can replicate the given resource or throw an exception.
     *
     * @param Request $request
     * @return bool
     */
    public function authorizeToReplicate(Request $request): bool
    {
        return false;
    }
}
