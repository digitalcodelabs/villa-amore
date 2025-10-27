<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Testimonial extends Model
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

    public function items(): HasMany
    {
        return $this->hasMany(TestimonialItem::class)->orderBy('order');
    }

    public function pageModules(): MorphMany
    {
        return $this->morphMany(PageModule::class, 'module', 'module_type', 'module_id');
    }
}
