<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;




class LoginController
{
    public function login(Request $request){
        // Validação apenas para verificar a existência na base de dados (sem a validação matemática do CPF)
        $request->validate([
            'cpf' => 'required|exists:usuarios,cpf',  // Só verifica se o CPF existe na base de dados
            'phone_number' => 'required|numeric|digits_between:10,11|exists:usuarios,telefone',
        ]);
    
        // Buscar o usuário com o CPF e o número de telefone
        $user = Usuarios::where('cpf', $request->cpf)
                        ->where('telefone', $request->phone_number)
                        ->first();
    
        // Se o usuário existir, loga e redireciona
        if ($user) {
            Auth::login($user);
            return redirect()->route('inicio');
        }
    
        // Caso contrário, retorna erro de credenciais inválidas
        return back()->withErrors(['login' => 'Credenciais inválidas']);
    }
    
    public function loginEmpresa(Request $request){
        
        $request->validate([
            'cnpj' => 'required|exists:empresa,cnpj',  
            'telefone' => 'required|numeric|digits_between:10,11|exists:empresa,telefone',
        ]);    
        
        $empresa = Empresa::where('cnpj', $request->cnpj)
                        ->where('telefone', $request->telefone)
                        ->first();

        // Se o usuário existir, loga e redireciona
        if ($empresa) {
            Auth::guard('empresa')->login($empresa);
            
            return redirect()->route('inicio');
        }
        

       
        // Caso contrário, retorna erro de credenciais inválidas
        return back()->withErrors(['login' => 'Credenciais inválidas']);
    }

    public function logout(){
        Auth::guard('empresa')->logout(); // Log out empresa
        Auth::guard('web')->logout();     // Log out usuario if needed
        return redirect('/');
    }

    public function showLoginForm(){
        return view('auth/login');
    }
    public function showLoginFormEmpresa(){
        return view ('auth/loginEmpresa');
    }
}