<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;


class CurriculoController extends Controller
{
    public function store(Request $request)
{
    // Validar os dados da requisição
    $request->validate([
        'vaga_id' => 'required|exists:vaga,id',  // Certifique-se de que a tabela 'vaga' existe
        'resume' => 'required|mimes:pdf|max:2048', // Apenas PDFs
    ]);

    // Armazenar o arquivo
    $path = $request->file('resume')->store('resumes', 'public');

    // Criar o registro do currículo
    Resume::create([
        'cpf_candidato' => auth()->user()->cpf,  // Usar o CPF do usuário logado
        'vaga_id' => $request->vaga_id,
        'file_path' => $path,
    ]);

    // Redirecionar para a rota "/aplicar" com uma mensagem de sucesso
    return redirect()->route('inicio') 
                     ->with('success', 'Currículo enviado com sucesso!');
}


    public function show(Resume $resume)
    {
        return response()->file(storage_path("app/public/{$resume->file_path}"));
    }
}
