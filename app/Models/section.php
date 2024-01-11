<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class section extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'namo',
        'active'
    ];

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
    
}
