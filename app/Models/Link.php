<?php

namespace App\Models;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $fillable = ['url', 'idea_id'];


    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }

}
