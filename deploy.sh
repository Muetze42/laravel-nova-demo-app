#!/bin/bash

php artisan migrate --seed --force
composer.phar install
php artisan optimize
