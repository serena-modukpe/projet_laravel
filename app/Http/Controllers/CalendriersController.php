<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendriers;
use App\Models\Matieres;
use App\Models\Classesites;
use App\Models\Statuts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class CalendriersController extends Controller
{
    //
    public function index() {

        // Vérifie si l'utilisateur est connecté

        if (auth()->check()) {
            // Récupère le rôle de l'utilisateur
            $role_id = auth()->user()->getrole->id;
    
            // Vérifie si l'utilisateur a le rôle de gestionnaire (par exemple, rôle_id = 2)
            if ($role_id == 2) {
                // Si l'utilisateur a le rôle de gestionnaire, récupérer toutes les calendriers
                $calendriers = Calendriers::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
            } else {
                // Si l'utilisateur n'a pas le rôle de gestionnaire, récupérer seulement les calendriers avec le statut_id = 1
                $calendriers = Calendriers::orderBy('created_at', 'desc')->get();
            }
    
            // Retourne la vue avec les calendriers récupérées
            return view("backend.tables.calendriers.index", compact("calendriers"));
        } 
        else 
        {
            // L'utilisateur n'est pas connecté, afficher un message d'erreur et rediriger vers la page de connexion
            return redirect()->route('login')->withErrors('Vous devez vous connecter pour accéder à cette page.');
        }
    }
    

    public function create(){
        
        $matieres = Matieres::where('statut_id', 1)->get();
        $classesites = Classesites::where('statut_id', 1)->get();
        return view('backend.tables.calendriers.create', compact(  'matieres', 'classesites'));
    }

    public function store(Request $request){

        $request->validate([
            'classesite_id' => 'required',
        ]);

      $user = Auth::user();
      $calendriers = new Calendriers();
      $calendriers->setAttribute("type_devoir", $request->type_devoir);
      $calendriers->setAttribute("classesite_id", $request->classesite_id);
      $calendriers->setAttribute("matiere_id", $request->matiere_id);
      $calendriers->setAttribute("date_debut", $request->date_debut);
      $calendriers->setAttribute("date_fin", $request->date_fin);
      $calendriers->setAttribute("created_by",$user->id ); 
      $calendriers->setAttribute("statut_id", 1);      
      $calendriers->setAttribute("created_at", new \DateTime()); 
      $calendriers->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("calendriers.index");

    }

    

 

    public function edit($id) {
        $calendrier = Calendriers::find($id);
        $user = Auth::user();
        $matieres = Matieres::all();
        $classesites = Classesites::where('statut_id', 1)->get();
        return view("backend.tables.calendriers.edit", compact("classesites", "matieres", "calendrier"));
    }

    public function update(Request $request, $id) {

        $user = Auth::user();
        $calendrier = Calendriers::find($id);

        $this->validate($request, [
            'classesite_id' => 'required',
            
           
        ]);
    
        $calendrier->setAttribute("type_devoir", $request->type_devoir);
        $calendrier->setAttribute("classesite_id", $request->classesite_id);
        $calendrier->setAttribute("matiere_id", $request->matiere_id);
        $calendrier->setAttribute("date_debut", $request->date_debut);
        $calendrier->setAttribute("date_fin", $request->date_fin);
        $calendrier->setAttribute("created_by",$user->id ); 
        $calendrier->setAttribute("statut_id", 1);      
        $calendrier->setAttribute("updated_at", new \DateTime()); 
        $calendrier->update();

        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les calendriers : route("calendriers.index")
        return redirect(route("calendriers.index"));
     }

    
    public function destroy($id) { 

        $calendrier = Calendriers::find($id);
        $calendrier->setAttribute("statut_id", 2);
        $calendrier->setAttribute("updated_at", new \DateTime()); 
        $calendrier->update();


        return redirect(route('calendriers.index'));
       
    }

}
