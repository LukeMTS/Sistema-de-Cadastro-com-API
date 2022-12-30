<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'razao_social',
        'nome',
        'telefone',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function endereco()
    {
        return $this->hasMany(Endereco::class, 'id', 'cliente_id');
    }
}
