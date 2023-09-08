<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Vérifier si le `role_id` de l'utilisateur authentifié est égal à 2
        if (auth()->user()->role_id == 2) {
            return redirect()->route("dashboard");
        }

        // On récupère tous les utilisateurs
        $users = User::orderBy('id', 'desc')->get();

        // Transmettre les utilisateurs à la vue
        return view("backend.tables.users.index", compact("users"));
    }

    public function create()
    {
        // Vérifier si le `role_id` de l'utilisateur authentifié est égal à 2
        if (auth()->user()->role_id == 2) {
            // Si le `role_id` de l'utilisateur est 2, restreindre l'accès ou rediriger vers une autre page
            return redirect()->route("dashboard");
        }

        $roles = Roles::all();
        return view('backend.tables.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Vérifier si le `role_id` de l'utilisateur authentifié est égal à 2
        if (auth()->user()->role_id == 2) {
            
            return redirect()->route("dashboard");
        }
        $request->merge(['nom' => strtoupper($request->input('nom'))]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'telephone' => 'regex:/^[0-9 +]+$/',
        ]);

        $users = new User();
        $users->setAttribute("name", $request->name);
        $users->setAttribute("prenom", $request->prenom);
        $users->setAttribute("email", $request->email);
        $users->setAttribute("telephone", $request->telephone);
        $users->setAttribute("password", $request->password);
        $users->setAttribute("role_id", $request->role_id);
        $users->setAttribute("created_at", new \DateTime());
        $users->save();
        Alert::success('Félicitations', 'enregistrement réussi');
        // 4. On retourne vers tous les utilisateurs : route("users.index")
        return redirect()->route("users.index");
    }

    // Vous pouvez ajouter d'autres méthodes ici...

}
