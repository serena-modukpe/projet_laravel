<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevoirsController extends Controller
{
    //
    public function index() {

        // Vérifie si l'utilisateur est connecté

        if (auth()->check()) {
            // Récupère le rôle de l'utilisateur
            $role_id = auth()->user()->getrole->id;
    
            // Vérifie si l'utilisateur a le rôle de gestionnaire (par exemple, rôle_id = 2)
            if ($role_id == 2) {
                // Si l'utilisateur a le rôle de gestionnaire, récupérer toutes les devoirs
                $devoirs = Devoirs::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
            } else {
                // Si l'utilisateur n'a pas le rôle de gestionnaire, récupérer seulement les devoirs avec le statut_id = 1
                $devoirs = Devoirs::orderBy('created_at', 'desc')->get();
            }
    
            // Retourne la vue avec les devoirs récupérées
            return view("backend.tables.devoirs.index", compact("devoirs"));
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
        return view('backend.tables.devoirs.create', compact(  'matieres', 'classeeleves'));
    }

    public function store(Request $request){

        $request->validate([
            'classeeleve_id' => 'required',
        ]);

      $user = Auth::user();
      $devoirs = new Devoirs();
      $devoirs->setAttribute("classeeleve_id", $request->classeeleve_id);
      $devoirs->setAttribute("matiere_id", $request->matiere_id);
      $devoirs->setAttribute("devoir1", $request->devoir1);
      $devoirs->setAttribute("devoir2", $request->devoir2);
      $devoirs->setAttribute("devoir3", $request->devoir3);
      $devoirs->setAttribute("created_by",$user->id ); 
      $devoirs->setAttribute("statut_id", 1);      
      $devoirs->setAttribute("created_at", new \DateTime()); 
      $devoirs->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("devoirs.index");

    }

    

 

    public function edit($id) {
        $devoir = Devoirs::find($id);
        $user = Auth::user();
        $matieres = Matieres::all();
        $classeeleves = Classeeleves::where('statut_id', 1)->get();
        return view("backend.tables.devoirs.edit", compact("classeeleves", "matieres", "devoir"));
    }

    public function update(Request $request, $id) {

        $user = Auth::user();
        $devoir = Devoirs::find($id);

        $this->validate($request, [
            'classeeleve_id' => 'required',
           
        ]);
    
        $devoir->setAttribute("classeeleve_id", $request->classeeleve_id);
        $devoir->setAttribute("matiere_id", $request->matiere_id);
        $devoir->setAttribute("devoir1", $request->devoir1);
        $devoir->setAttribute("devoir2", $request->devoir2);
        $devoir->setAttribute("devoir3", $request->devoir3);
        $devoir->setAttribute("created_by", $user->id); 
        $devoir->setAttribute("statut_id", 1);
        $devoir->setAttribute("updated_at", new \DateTime()); 
        $devoir->update();

        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les devoirs : route("devoirs.index")
        return redirect(route("devoirs.index"));
     }

    
    public function destroy($id) { 

        $devoir = Devoirs::find($id);
        $devoir->setAttribute("statut_id", 2);
        $devoir->setAttribute("updated_at", new \DateTime()); 
        $devoir->update();


        return redirect(route('devoirs.index'));
       
    }
}
