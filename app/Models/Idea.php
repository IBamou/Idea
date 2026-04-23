<?php

namespace App\Models;

use App\Models\Step;
use App\Models\Link;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{
    protected $fillable = ['title', 'description', 'status',  'image_url', 'user_id'];
    public function steps(): HasMany {
        return $this->hasMany(Step::class);
    }

    public function links(): HasMany {
        return $this->hasMany(Link::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
