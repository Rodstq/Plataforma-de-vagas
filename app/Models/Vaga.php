<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vaga';

    public $timestamps = false;
   
    protected $fillable = [
        'nome',
        'cargo',
        'contato',
        'formacao',
        'cnpj',
        'descricao',
        'aprovado',
        'ramo',
    ];
}
