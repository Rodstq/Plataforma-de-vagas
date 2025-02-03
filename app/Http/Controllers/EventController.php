<?php

namespace App\Http\Controllers;

use App\Models\inscricao;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Vaga;

class EventController extends Controller
{
    public function create(){
        return view('events.create');
    }

    public function contact(){
        return view('contact');
    }

    public function login(){
        return view('login');
    }

    public function about(){
        return view('about');
    }

    public function users($id){
        $search = request('search');
        return view('users', ['id'=>$id, 'search' => $search]);
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function index(){

        $vaga = vaga::all();

        return view('index', ['vaga' => $vaga]);
    }

    public function detalhesvaga($id){

        $vaga = vaga::find($id);

        // Conta o número de inscrições (usuários) na vaga
        $quantidadeinscritos = inscricao::where('vagaid', $id)->count();

        return view('detalhesvaga', ['vaga'=>$vaga, 'quantidadeinscritos'=> $quantidadeinscritos]);
    }

    public function candidatosvaga($id){

        $vaga = vaga::find($id);

        $candidatos = inscricao::where('vagaid', $id)->get();

        $cpfs = $candidatos->pluck('cpf')->toArray();

        // Buscar os usuários com os CPFs extraídos
        $usuarios = Usuarios::whereIn('cpf', $cpfs)->get();

        return view('candidatosvaga', ['vaga'=>$vaga,'usuarios'=>$usuarios]);
    }

    public function criarvaga(){
        return view('criarvaga');
    }

    public function criavaga(Request $request){

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

        return redirect()->route('criarvaga')->with('success', 'Vaga criada com sucesso!');
    }

    public function criausuario(Request $request){

        // Validate the request data
        $request->validate([
        'cpf' => 'required|digits:11|unique:usuarios,cpf',
        'nome' => 'required|string|max:255',
        'telefone' => 'required|digits:11',
        'formacao' => 'required|string|max:255',
        ]);

        // Insert into the usuarios table
        Usuarios::create($request->except('_token'));

        // Redirect with a success message
        return redirect()->route('cadastro')->with('success', 'Usuário criado com sucesso!');

    }
}


 