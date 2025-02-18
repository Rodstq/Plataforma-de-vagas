<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable  
{

    protected $table = 'empresa'; // Define explicit table name

    protected $primaryKey = 'cnpj'; // Set the correct primary key

    public $incrementing = false; // CNPJ is not auto-incrementing

    protected $keyType = 'string'; // CNPJ is a string

    public $timestamps = false; // Only if your table doesn't have timestamps

    protected $fillable = ['cnpj', 'nome', 'telefone', 'ramo'];

    protected $guarded = []; // Ensure no fields are accidentally guarded

    public function getAuthIdentifierName()
    {
        return 'cnpj';  
    }
}
