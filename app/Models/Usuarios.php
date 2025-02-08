<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Import the Authenticatable class

class Usuarios extends Authenticatable  // Extend Authenticatable
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
        'password'
    ];

    // You may also want to define the `getAuthIdentifier` method manually if needed:
    public function getAuthIdentifierName()
    {
        return 'cpf';  // Define your primary key field (in this case, CPF)
    }

    public function getAuthIdentifier()
    {
        return $this->cpf;  // Return the unique identifier
    }

    public function getAuthPassword()
    {
        return $this->password;  // Return the password attribute
    }
}
