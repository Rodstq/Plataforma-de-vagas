<?php

namespace App\Http\Controllers;

use App\Models\inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'cpf' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Get the user by CPF
        $user = Usuarios::where('cpf', $request->cpf)->first();
    
        // Check if user exists and if the password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication passed, log in the user
            Auth::guard('web')->login($user);  // Explicitly use the 'web' guard
            return redirect()->intended('dashboard');
        } else {
            // Authentication failed
            return back()->withErrors(['cpf' => 'Invalid credentials.']);
        }
    }

    public function showLoginForm(){
        return view('auth/login');
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

    public function detalhes_vaga($id){

        $vaga = vaga::find($id);

        // Conta o número de inscrições (usuários) na vaga
        $quantidadeinscritos = inscricao::where('vagaid', $id)->count();

        return view('detalhes_vaga', ['vaga'=>$vaga, 'quantidadeinscritos'=> $quantidadeinscritos]);
    }

    public function candidatos_vaga($id){

        $vaga = vaga::find($id);

        $candidatos = inscricao::where('vagaid', $id)->get();

        $cpfs = $candidatos->pluck('cpf')->toArray();

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

    public function registerSubmit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'cpf' => 'required|digits:11|unique:usuarios,cpf',
            'nome' => 'required|string|max:255',
            'telefone' => 'required|digits:11',
            'formacao' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed', // Add password validation
        ]);
    
        // Hash the password before storing it
        $password = Hash::make($request->password);
    
        // Insert into the usuarios table with the hashed password
        Usuarios::create([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'formacao' => $request->formacao,
            'password' => $password, // Store the hashed password
        ]);
    
        // Redirect with a success message
        return redirect()->route('login')->with('success', 'Usuário criado com sucesso!');
    }
    
    public function aplicar($vagaId){
        return view('aplicar', compact('vagaId'));
    }

}


 