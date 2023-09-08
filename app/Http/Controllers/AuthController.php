<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Mail\NewCompte;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.connexion');
    }  
      
    public function customLogin(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|',
            
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        
  
         else {
        return redirect("login")->withErrors(['auth' => 'Informations de connexion incorrectes']);
    }
}

    public function registration()
    {
        return view('auth.inscription');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);
           
        $user = new User();
        $user->setAttribute('name', $request->name);
        $user->setAttribute('prenom', $request->prenom);
        $user->setAttribute('email', $request->email);
        $user->setAttribute('telephone', $request->telephone);
        $user->setAttribute('role_id',1 );
        $user->setAttribute('password', Hash::make($request->password));
        $user->save();

        $contenu = [
            'name' => $user->name,
            'prenom' => $user->prenom,
            'email' => $user->email,
            'mot_de_passe' => $request->password,
            'subject'=> 'Ecole-Inscription '
        ];
        $email = $request->email;

        # code...
        Mail::to($user->email)->queue(new NewCompte($contenu));


        return redirect("login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'prenom' => $data['prenom'],
        'email' => $data['email'],
        'telephone' => $data['telephone'],
        'role_id' => $data['role_id'],
        'password' => Hash::make($data['password']),
      ]);
      
    }    
    
    public function dashboard()
    {
        // Vérifie si l'utilisateur est connecté

        if (Auth::check()) {
            $user = Auth::user();

            // Vérifie si l'id du rôle de l'utilisateur est égal à 3 (ou 1)
            // Si oui, affiche le dashboard, sinon affiche la page paramètre
            return $user->role_id == 3 ? view('backend.dashboard') : view('backend.parametre');
        }

        // Si l'utilisateur n'est pas connecté, redirige-le vers la page de connexion
        return redirect("login")->withSuccess('Vous n\'êtes pas autorisé à accéder.');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}