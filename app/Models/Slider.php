<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function slides(): HasMany
    {
        return $this->hasMany(SliderSlide::class)->orderBy('order');
    }

    public function pageModules(): MorphMany
    {
        return $this->morphMany(PageModule::class, 'module', 'module_type', 'module_id');
    }
}
