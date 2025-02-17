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
    public function edit(Request $request): View
{
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

    abort(403); // If no user is authenticated, prevent unauthorized access
}


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse{
    
        if (Auth::guard('empresa')->check()) {
            $user = Empresa::find(Auth::guard('empresa')->id());
        } elseif (Auth::guard('web')->check()) {
            $user = Usuarios::find(Auth::guard('web')->id()); 
        } else {
            return redirect()->route('login')->withErrors('Usuário não autenticado.');
        }
    
        if (!$user) {
            return redirect()->route('profile.edit')->withErrors('Usuário não encontrado.');
        }
    
        // Fill with validated form data
        $user->fill($request->validated());
    
        // Check if any changes were made
        if ($user->isDirty()) {
            Log::info('Mudanças detectadas:', $user->getDirty());
    
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
