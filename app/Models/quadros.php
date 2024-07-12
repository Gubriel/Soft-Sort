<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class quadros extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","nome","descricao"];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function coluna(): HasMany
    {
        return $this->hasMany(Coluna::class);
    }
}
