#!/bin/bash

php artisan migrate --seed --force
composer.phar install --optimize-autoloader
php artisan optimize
