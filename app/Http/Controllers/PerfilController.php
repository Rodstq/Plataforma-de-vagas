<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Empresa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Models\Usuarios;

class PerfilController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View{
        
    if (Auth::guard('empresa')->check()) {
        $empresaUser = Auth::guard('empresa')->user();
        return view('profile.edit_empresa', [
            'user' => $empresaUser,
        ]);
        
    } elseif (Auth::guard('web')->check()) {
        $webUser = Auth::guard('web')->user();
        return view('profile.edit', [
            'user' => $webUser,
        ]);
    }

    abort(404); // If no user is authenticated, prevent unauthorized access
}

    public function update(ProfileUpdateRequest $request): RedirectResponse {

        // Fetch the authenticated user (empresa)
        $user = Auth::guard('web')->user();

        // Check if user is authenticated and exists
        if (!$user) {
         return redirect()->route('profile.edit')->withErrors('Usuário não autenticado.');
        }

        $user = Usuarios::find($user->cpf);

        if ($user) {
            // Manually update the fields
            $user->nome = $request->input('nome');
            $user->telefone = $request->input('telefone');
            $user->formacao = $request->input('formacao');

            // Save the changes

            $user->save(); // This should work now

             // Reauthenticate the user to ensure session stays intact
            Auth::guard('web')->login($user);

        } else {
            return redirect()->route('inicio')->withErrors('Usuário não encontrado.');
        }
            return redirect()->route('inicio')->with('status', 'profile-updated');
    }
    



    public function update_empresa(ProfileUpdateRequest $request): RedirectResponse {

        // Fetch the authenticated user (empresa)
        $user = Auth::guard('empresa')->user();

        // Check if user is authenticated and exists
        if (!$user) {
        return redirect()->route('profile.edit')->withErrors('Usuário não autenticado.');
        }

        $empresa = Empresa::find($user->cnpj);

        if ($empresa) {
            // Manually update the fields
            $empresa->nome = $request->input('nome');
            $empresa->telefone = $request->input('telefone');
            $empresa->ramo = $request->input('ramo');

            // Save the changes

            $empresa->save(); // This should work now

             // Reauthenticate the user to ensure session stays intact
            Auth::guard('empresa')->login($empresa);

        } else {
            return redirect()->route('inicio')->withErrors('Usuário não encontrado.');
        }
            return redirect()->route('inicio')->with('status', 'profile-updated');
    }
    
     
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
