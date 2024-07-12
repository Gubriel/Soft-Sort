<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cards extends Model
{
    use HasFactory;

    protected $fillable = [
    "coluna_id",
    "nome",
    "tipo",
    "tamanho",
    "cor",
    "descricao",
    "qntd",
    "qntd_limite",
    "posicao"
    ];

    public function coluna(): BelongsTo
    {
        return $this->belongsTo(Coluna::class);
    }
}
