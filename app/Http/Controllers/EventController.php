<?php

namespace App\Http\Controllers;

use App\Models\inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use App\Models\Vaga;
use App\Models\Resume;


class EventController extends Controller
{
    public function create(){
        return view('events.create');
    }

    public function contact(){
        return view('contact');
    }


    public function about(){
        return view('about');
    }

    public function users($id){
        $search = request('search');
        return view('users', ['id'=>$id, 'search' => $search]);
    }

    public function register(){
        return view('auth/register');
    }

    public function index(){

        $vaga = vaga::all();

        return view('index', ['vaga' => $vaga]);
    }

    public function detalhes_vaga($id) {
        $vaga = Vaga::find($id);
    
        // Conta o número de currículos associados à vaga na tabela 'resumes'
        $quantidadeinscritos = Resume::where('vaga_id', $id)->count();
    
        return view('detalhes_vaga', [
            'vaga' => $vaga,
            'quantidadeinscritos' =>  $quantidadeinscritos
        ]);
    }

    public function candidato($cpf) {

        $candidato = Usuarios::find($cpf);

        $curriculo = Resume::where('cpf_candidato', $cpf)->first();
        
        return view('candidato', ['candidato' => $candidato, 'curriculo' => $curriculo]);
    }

    public function candidatos_vaga($id){

        $vaga = vaga::find($id);

        $candidatos = Resume::where('vaga_id', $id)->get();

        $cpfs = $candidatos->pluck('cpf_candidato')->toArray();

        // Buscar os usuários com os CPFs extraídos
        $usuarios = Usuarios::whereIn('cpf', $cpfs)->get();

        return view('candidatos_vaga', ['vaga'=>$vaga,'usuarios'=>$usuarios]);
    }

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

    public function registerSubmit(Request $request){
            // Validar os dados da requisição
            $request->validate([
                'cpf' => 'required|digits:11|unique:usuarios,cpf',
                'nome' => 'required|string|max:255',
                'telefone' => 'required|digits:11',
                'formacao' => 'required|string|max:255',
            ]);

            // Inserir no banco de dados na tabela 'usuarios'
            Usuarios::create([
                'cpf' => $request->cpf,
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'formacao' => $request->formacao,
            ]);

            // Redirecionar com uma mensagem de sucesso
            return redirect()->route('login')->with('success', 'Usuário criado com sucesso!');
        }
    
    public function aplicar($vagaId){

        $vaga = vaga::find($vagaId);
        $vagaDesc = $vaga->descricao;
        $vagaNome = $vaga->nome;

        return view('aplicar', compact('vagaId', 'vagaNome', 'vagaDesc'));
    }

}


 