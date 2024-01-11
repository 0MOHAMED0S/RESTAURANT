<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'path',
        'section_id',
        'details'
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
    
}
