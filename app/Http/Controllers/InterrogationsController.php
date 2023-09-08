<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interrogations;
use App\Models\Matieres;
use App\Models\Classeeleves;
use App\Models\Statuts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InterrogationsController extends Controller
{
    //
    public function index() {

        // Vérifie si l'utilisateur est connecté

        if (auth()->check()) {
            // Récupère le rôle de l'utilisateur
            $role_id = auth()->user()->getrole->id;
    
            // Vérifie si l'utilisateur a le rôle de gestionnaire (par exemple, rôle_id = 2)
            if ($role_id == 2) {
                // Si l'utilisateur a le rôle de gestionnaire, récupérer toutes les interrogations
                $interrogations = Interrogations::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
            } else {
                // Si l'utilisateur n'a pas le rôle de gestionnaire, récupérer seulement les interrogations avec le statut_id = 1
                $interrogations = Interrogations::orderBy('created_at', 'desc')->get();
            }
    
            // Retourne la vue avec les interrogations récupérées
            return view("backend.tables.interrogations.index", compact("interrogations"));
        } 
        else 
        {
            // L'utilisateur n'est pas connecté, afficher un message d'erreur et rediriger vers la page de connexion
            return redirect()->route('login')->withErrors('Vous devez vous connecter pour accéder à cette page.');
        }
    }
    

    public function create(){
        
        $matieres = Matieres::where('statut_id', 1)->get();
        $classeeleves = Classeeleves::where('statut_id', 1)->get();
        return view('backend.tables.interrogations.create', compact(  'matieres', 'classeeleves'));
    }

    public function store(Request $request){

        $request->validate([
            'classeeleve_id' => 'required',
        ]);

      $user = Auth::user();
      $interrogations = new Interrogations();
      $interrogations->setAttribute("classeeleve_id", $request->classeeleve_id);
      $interrogations->setAttribute("matiere_id", $request->matiere_id);
      $interrogations->setAttribute("note", $request->note);
      $interrogations->setAttribute("created_by",$user->id ); 
      $interrogations->setAttribute("statut_id", 1);      
      $interrogations->setAttribute("created_at", new \DateTime()); 
      $interrogations->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("interrogations.index");

    }

    

 

    public function edit($id) {
        $interrogation = Interrogations::find($id);
        $user = Auth::user();
        $matieres = Matieres::all();
        $classeeleves = Classeeleves::where('statut_id', 1)->get();
        return view("backend.tables.interrogations.edit", compact("classeeleves", "matieres", "interrogation"));
    }

    public function update(Request $request, $id) {

        $user = Auth::user();
        $interrogation = Interrogations::find($id);

        $this->validate($request, [
            'classeeleve_id' => 'required',
           
        ]);
    
        $interrogation->setAttribute("classeeleve_id", $request->classeeleve_id);
        $interrogation->setAttribute("matiere_id", $request->matiere_id);
        $interrogation->setAttribute("note", $request->note);
        $interrogation->setAttribute("created_by", $user->id); 
        $interrogation->setAttribute("statut_id", 1);
        $interrogation->setAttribute("updated_at", new \DateTime()); 
        $interrogation->update();

        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les interrogations : route("interrogations.index")
        return redirect(route("interrogations.index"));
     }

    
    public function destroy($id) { 

        $interrogation = Interrogations::find($id);
        $interrogation->setAttribute("statut_id", 2);
        $interrogation->setAttribute("updated_at", new \DateTime()); 
        $interrogation->update();


        return redirect(route('interrogations.index'));
       
    }
}
