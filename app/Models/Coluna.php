<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coluna extends Model
{
    use HasFactory;
    protected $fillable = ["quadro_id","nome","descricao"];

    public function quadros(): BelongsTo
    {
        return $this->belongsTo(quadros::class);
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Cards::class);
    }
}
