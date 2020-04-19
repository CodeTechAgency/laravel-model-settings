# Laravel Settingable

Endow your Laravel models with settings!

[![Latest version](https://img.shields.io/github/release/CodeTechPt/laravel-settingable?style=flat-square)](https://github.com/CodeTechPt/laravel-settingable/releases)
[![GitHub license](https://img.shields.io/github/license/CodeTechPt/laravel-settingable?style=flat-square)](https://github.com/CodeTechPt/laravel-settingable/blob/master/LICENSE)


## Installation

Add the package to your Laravel app using composer

```
composer require codetech/laravel-settingable
```


### Service Provider

Register the package's service provider in config/app.php. In Laravel versions 5.5 and beyond, this step can be skipped if package auto-discovery is enabled.

```
'providers' => [

    ...
    CodeTech\Settingable\Providers\SettingableServiceProvider::class,
    ...

];
```


### Migrations

Execute the next Artisan command to run the migrations.

```
php artisan migrate

```


## Usage

To start logging CRUD operations simply use the trait on your models.

```

use CodeTechCMS\Settingable\Traits\Settingable;

class Theme extends Model
{
    use Settingable;

    ...
```

### Retrieve model settings

#### Querying the database
```
// Get all settings
$settings = $theme->settings;

// Get settings from a specific scope
$scopedSettings = $theme->settings()->ofScope('colors')->get();
```

#### Using the config helper
```
config('theme.colors.primary');
```


---


## License

**codetech/laravel-settingable** is open-sourced software licensed under the [MIT license](https://github.com/CodeTechPt/laravel-settingable/blob/master/LICENSE).


## About CodeTech

[CodeTech](https://www.codetech.pt) is a web development agency based on Matosinhos, Portugal. Oh, and we LOVE Laravel!
