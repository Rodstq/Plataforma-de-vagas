<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use App\Models\Empresa;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cpf' => 'required|digits:11|unique:usuarios,cpf',
            'nome' => 'required|string|max:255',
            'telefone' => 'required|digits:11',
            'formacao' => 'required|string|max:255',
        ]);

        $user = Usuarios::create([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'formacao' => $request->formacao,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('inicio');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeEmpresa(Request $request): RedirectResponse
    {
        $request->validate([
            'cnpj' => 'required|digits:14|unique:empresa,cnpj',
            'nome' => 'required|string|max:255',
            'telefone' => 'required|digits:11',
            'ramo' => 'required|string|max:255',
        ]);
       
        $empresa = Empresa::create([
            'cnpj' => $request->cnpj,
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'ramo' => $request->ramo,
        ]);

        

        event(new Registered($empresa));

        Auth::login($empresa);

        return redirect('inicio');
    }
}
