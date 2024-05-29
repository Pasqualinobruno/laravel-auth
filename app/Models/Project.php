<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'cover_image', 'content', 'type_id'];



    public function projects(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
