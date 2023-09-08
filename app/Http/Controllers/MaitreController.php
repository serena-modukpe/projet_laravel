<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaitreController extends Controller
{
    //
    public function index(){
        if (Auth::check()) {
            // Récupère le rôle de l'utilisateur
            $role_id = Auth::user()->role_id;
    
            // Vérifie si l'utilisateur a le rôle de maitre (par exemple, rôle_id = 2)
            if ($role_id == 4) {
                // Si l'utilisateur est un maitre, affiche la vue "parametre" pour les gestionnaires
                return view('backend.maitre');
            }
    
            // Sinon, affiche la vue "parametre" par défaut pour les autres utilisateurs
            return view('backend.parametre');
        }
    
        return redirect()->route('login')->withErrors('Vous devez vous connecter pour accéder à cette page.');
    }
}
