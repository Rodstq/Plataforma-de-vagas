<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagasController extends Controller
{
    public function criar_vaga(){
        return view('criar_vaga');
    }

    public function cria_vaga(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'contato' => 'required|string|max:255',
            'formacao' => 'required|string|max:255',
            'cnpj' => 'required|digits:14|exists:empresa,cnpj',
            'descricao' => 'required|string',
            'aprovado' => 'boolean',
            'ramo' => 'required|string|max:255',
        ]);

        Vaga::create($request->except('_token'));

        return redirect()->route('criar_vaga')->with('success', 'Vaga criada com sucesso!');
    }

    public function update_vaga_view($id){

        $vaga = Vaga::find($id);

        return view('crudvagas.update_vaga',['vaga' => $vaga]);
        
    }

    public function update_vaga(Request $request){

        $vaga = Vaga::find($request->id);

        // Verifica se a vaga existe
        if (!$vaga) {
            return redirect()->back()->with('error', 'Vaga não encontrada.');
        }

        $vaga->nome = $request->nome;
        $vaga->cargo = $request->cargo;
        $vaga->contato = $request->contato;
        $vaga->formacao = $request->formacao;
        $vaga->cnpj = $request->cnpj;
        $vaga->descricao = $request->descricao;
        $vaga->aprovado = $request->aprovado;
        $vaga->ramo = $request->ramo;

        $vaga->save();

        return redirect()->route('crudvagas.update_vaga')->with('success', 'Vaga atualizada com sucesso!');
    }

}