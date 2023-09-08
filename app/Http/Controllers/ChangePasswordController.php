<?php
   
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\changerpassword;

use Illuminate\Bus\Queueable;

   
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

  
class ChangePasswordController extends Controller
{
    
    public function index()
    {
        return view('changermotdepasse');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        $contenu = [
            'name' => auth()->user()->name,
            'prenom' => auth()->user()->prenom,
            'email' => auth()->user()->email,
            'mot_de_passe' => auth()->user()->password,
            'subject'=> 'Ecole-Changement de mot de passe '
        ];
        $email = $request->email;   

        # code...
        Mail::to(auth()->user()->email)->queue(new changerpassword($contenu));


   
        return redirect ("login");
    }
}