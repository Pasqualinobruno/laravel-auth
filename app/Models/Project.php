<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Tecnoligy;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'cover_image', 'content', 'type_id'];



    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function tecnoligies(): BelongsToMany
    {
        return $this->belongsToMany(Tecnoligy::class);
    }
}
