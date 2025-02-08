<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = ['cpf_candidato', 'vaga_id', 'file_path']; // Corrigido para 'cpf_candidato'

    public function candidate()
    {
        return $this->belongsTo(Usuarios::class, 'cpf_candidato', 'cpf');  // Relacionamento com a tabela 'usuarios'
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class, 'vaga_id');  // Relacionamento com a tabela 'vaga'
    }
}
