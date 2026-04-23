<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Step extends Model
{
    protected $fillable = ['step', 'status', 'idea_id'];

    public function idea(): BelongsTo {
        return $this->belongsTo(Idea::class);
    }
}
