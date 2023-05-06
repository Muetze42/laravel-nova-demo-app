#!/bin/bash

php artisan migrate:fresh --seed --force
composer.phar install --optimize-autoloader
php artisan optimize
