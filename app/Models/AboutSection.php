<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'content',
        'button_text',
        'button_url',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function pageModules(): MorphMany
    {
        return $this->morphMany(PageModule::class, 'module', 'module_type', 'module_id');
    }
}
