<?php

namespace Modules\PopupSystem\Entities;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\PopupSystem\Enums\PopupTypeEnum;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "name",
        "content",
        "config"
    ];

    protected $casts = ["type" => PopupTypeEnum::class];

    protected function config(): Attribute
    {
        return Attribute::make(get: function ($value) {
            return is_array($value) ? $value : json_decode($value, true);
        });
    }

    protected function position(): Attribute
    {
        return Attribute::make(get: fn() => $this->config['position'] ?? null);
    }

    protected function status(): Attribute
    {
        return Attribute::make(get: fn() => $this->config['icon'] ?? null);
    }

    protected function theme(): Attribute
    {
        return Attribute::make(get: fn() => $this->config['theme'] ?? null);
    }

    protected function delay(): Attribute
    {
        return Attribute::make(get: fn() => $this->config['delay'] / 1000 ?? null);
    }

    public function compaigns(): BelongsToMany
    {
        return $this->belongsToMany(Compaign::class, 'compaign_popup');
    }
}
