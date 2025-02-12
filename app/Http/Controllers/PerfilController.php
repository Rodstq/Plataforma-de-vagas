<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse{
    // Verifique os dados enviados
    Log::info('Dados do formulário: ', $request->all());

    $user = Usuarios::find(auth()->id());

    // Preenche o usuário com os dados do formulário
    $user->fill($request->validated());

    // Verifique se algo foi alterado
    if ($user->isDirty()) {
        Log::info('Mudanças detectadas: ', $user->getDirty());

        if ($user->isDirty('cpf')) {
            $user->cpf_verified_at = null;
        }

        $user->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    } else {
        return Redirect::route('profile.edit')->with('status', 'no-changes');
    }
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
