<?php

namespace Modules\PopupSystem\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Compaign extends Model
{
    use HasFactory;

    public function popups(): BelongsToMany
    {
        return $this->belongsToMany(Popup::class, 'compaign_popup');
    }

    protected $with = ['website'];


    public function website(): belongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
