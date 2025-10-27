<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class)->orderBy('order');
    }

    public function pageModules(): MorphMany
    {
        return $this->morphMany(PageModule::class, 'module', 'module_type', 'module_id');
    }
}
