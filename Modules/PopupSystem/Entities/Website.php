<?php

namespace Modules\PopupSystem\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Website extends Model
{
    use HasFactory;

    public function compaings(): HasMany
    {
        return $this->hasMany(Compaign::class);
    }
}
