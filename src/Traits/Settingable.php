<?php

namespace CodeTechCMS\Settingable\Traits;

use CodeTechCMS\Settingable\Models\ModelSetting;

trait Settingable
{
    /**
     * Get all of this model's settings.
     */
    public function settings()
    {
        return $this->morphMany(ModelSetting::class, 'settingable');
    }

}
