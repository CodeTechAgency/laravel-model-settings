<?php

namespace CodeTech\ModelSettings\Traits;

use CodeTech\ModelSettings\Models\ModelSetting;

trait HasSettings
{
    /**
     * Get all of this model's settings.
     */
    public function settings()
    {
        return $this->morphMany(ModelSetting::class, 'settingable');
    }

}
