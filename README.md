# Laravel Model Settings

A Laravel package that allows you to assign settings to your models.

[![Latest version](https://img.shields.io/github/release/CodeTechPt/laravel-model-settings?style=flat-square)](https://github.com/CodeTechPt/laravel-model-settings/releases)
[![GitHub license](https://img.shields.io/github/license/CodeTechPt/laravel-model-settings?style=flat-square)](https://github.com/CodeTechPt/laravel-model-settings/blob/master/LICENSE)


## Installation

Add the package to your Laravel app using composer

```
composer require codetech/laravel-model-settings
```


### Service Provider

Register the package's service provider in config/app.php. In Laravel versions 5.5 and beyond, this step can be skipped if package auto-discovery is enabled.

```
'providers' => [

    ...
    Codetech\ModelSettings\Providers\ModelSettingsServiceProvider::class,
    ...

];
```


### Migrations

Execute the next Artisan command to run the migrations.

```
php artisan migrate

```


## Usage

Use the trait in your models.

```

use CodeTechCMS\ModelSettings\Traits\HasSettings;

class Theme extends Model
{
    use HasSettings;

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
If you have load_into_memory enabled, you can access the settings with the config() helper.

```
config('theme.colors.primary');
```


---


## License

**codetech/laravel-model-settings** is open-sourced software licensed under the [MIT license](https://github.com/CodeTechPt/laravel-model-settings/blob/master/LICENSE).


## About CodeTech

[CodeTech](https://www.codetech.pt) is a web development agency based on Matosinhos, Portugal. Oh, and we LOVE Laravel!
