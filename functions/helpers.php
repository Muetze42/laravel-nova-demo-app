<?php

if (!function_exists('errorImage')) {
    /**
     * Choose an error image
     *
     * @param int $errorCode
     * @return string
     */
    function errorImage(int $errorCode): string
    {
        $errorImages = [
            '401' => '403.svg',
            '403' => '403.svg',
            '404' => '404.svg',
            '500' => '503.svg',
        ];

        return $errorImages[$errorCode] ?? '404.svg';
    }
}
