<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cpf',
        'nome',
        'telefone',
        'formacao',
        'tipousuario',
    ];
}
