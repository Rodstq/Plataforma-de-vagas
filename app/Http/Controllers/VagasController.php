<?php

namespace App\Http\Controllers;

use App\Models\inscricao;
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

        // Define 'aprovado' como true se não for fornecido
        $vaga->aprovado = $request->aprovado ?? true;  // Use true como valor padrão

        $vaga->save();
        if ($vaga->save()) {
        $vaga = Vaga::find($request->id);
        return redirect()->route('vaga.update.view',['id' => $vaga->id ])->with('success', 'Vaga atualizada com sucesso!');
        } else {
            dd('Erro ao salvar!');
        }
    }

    public function deleta_vaga($id){

        $vaga = Vaga::find($id);

        return view ('vaga_delete',['vaga'=>$vaga]);
    }


    public function deletar_vaga($id){

    // Delete related inscricoes using the vagaid
    $inscricoes = Inscricao::where('vagaid', $id)->get();

    // Delete all related inscricoes
    foreach ($inscricoes as $inscricao) {
        $inscricao->delete();
    }

    $vaga = Vaga::find($id);
    if ($vaga) {
        $vaga->delete();
    }

    return redirect()->route('inicio')->with('success', 'Vaga e inscrições deletadas com sucesso!');

    }

}