<?php

namespace CodeTech\ModelSettings\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ModelSetting extends Model
{
    /**
     * @inheritDoc
     */
    protected $fillable = [
        'path',
        'name',
        'scope',
        'value'
    ];


    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Scope a query to only include media items of a given scope.
     *
     * @param Builder $query
     * @param string $scope
     * @return Builder
     */
    public function scopeOfScope(Builder $query, string $scope)
    {
        return $query->where('scope', $scope);
    }


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Get the owning commentable model.
     */
    public function settingable()
    {
        return $this->morphTo();
    }
}
