# Laravel Nova Demo App

## Development

### Add A Package

* Use only the [development branch](https://github.com/Muetze42/laravel-nova-demo-app/tree/development)
* Create for each package an own Model, Migration, Nova resource and optional a Factory or Seeder
* Every Seeder in the `database/seeders` folder [runs automatic](database/seeders/DatabaseSeeder.php) only one times on [deployment](deploy.sh)
* Use the `writable` method in every Seeder. (Examples: `Model::writeable()->factory()`
  / [NormanHuthFontAwesomeFieldSeeder::class](database/seeders/NormanHuthFontAwesomeFieldSeeder.php))
* Add the created Nova resource to the [Nova menu](app/Providers/NovaServiceProvider.php)
* Local use `php artisan migrate --seed` and `php artisan helper` in development
