<?php

namespace CodeTech\ModelSettings\Providers;

use CodeTech\ModelSettings\Models\ModelSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ModelSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/model-settings.php', 'settingable'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load migrations from custom path
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->setPublishableFiles();

        if (config('model-settings.load_into_memory')) {
            $this->loadSettings();
        }
    }

    /**
     * Set which files can be published.
     */
    private function setPublishableFiles()
    {
        $this->publishes([
            __DIR__ . '/../config/model-settings.php' => config_path('model-settings.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Load settings into memory.
     */
    private function loadSettings()
    {
        $settings = ModelSetting::select('root', 'path', 'value')->get();

        $results = [];

        foreach ($settings as $setting) {
            $fullPath = $setting->root . '.' . $setting->path;

            $keys = explode('.', $fullPath);

            $temp = &$results;

            foreach ($keys as $key) {
                $temp = &$temp[$key];
            }

            $temp = $setting->value;

            unset($temp);
        }

        foreach ($results as $key => $result) {
            if (!is_array($result)) {
                Config::set($key, $result);

                continue;
            }

            $configs = config($key) ? array_merge(config($key), $result) : $result;

            Config::set($key, $configs);
        }
    }
}
