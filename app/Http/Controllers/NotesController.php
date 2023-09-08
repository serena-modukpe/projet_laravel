<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\Matieres;
use App\Models\Classeeleves;
use App\Models\Statuts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class NotesController extends Controller
{
    //
    public function index() {

        // Vérifie si l'utilisateur est connecté

        if (auth()->check()) {
            // Récupère le rôle de l'utilisateur
            $role_id = auth()->user()->getrole->id;
    
            // Vérifie si l'utilisateur a le rôle de gestionnaire (par exemple, rôle_id = 2)
            if ($role_id == 2) {
                // Si l'utilisateur a le rôle de gestionnaire, récupérer toutes les notes
                $notes = Notes::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
            } else {
                // Si l'utilisateur n'a pas le rôle de gestionnaire, récupérer seulement les notes avec le statut_id = 1
                $notes = Notes::orderBy('created_at', 'desc')->get();
            }
    
            // Retourne la vue avec les notes récupérées
            return view("backend.tables.notes.index", compact("notes"));
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
        return view('backend.tables.notes.create', compact(  'matieres', 'classeeleves'));
    }

    public function store(Request $request){

        $request->validate([
            'classeeleve_id' => 'required',
        ]);

      $user = Auth::user();
      $notes = new Notes();
      $notes->setAttribute("classeeleve_id", $request->classeeleve_id);
      $notes->setAttribute("matiere_id", $request->matiere_id);
      $notes->setAttribute("note1", $request->note1);
      $notes->setAttribute("note2", $request->note2);
      $notes->setAttribute("note3", $request->note3);
      $notes->setAttribute("devoir1", $request->devoir1);
      $notes->setAttribute("devoir2", $request->devoir2);
      $notes->setAttribute("devoir3", $request->devoir3);
      $notes->setAttribute("moyeninterro", $request->moyeninterro);
      $notes->setAttribute("moyendevoir", $request->moyendevoir);
      $notes->setAttribute("moyenne", $request->moyenne);
      $notes->setAttribute("created_by",$user->id ); 
      $notes->setAttribute("statut_id", 1);      
      $notes->setAttribute("created_at", new \DateTime()); 
      $notes->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("notes.index");

    }

    

 

    public function edit($id) {
        $note = Notes::find($id);
        $user = Auth::user();
        $matieres = Matieres::all();
        $classeeleves = Classeeleves::where('statut_id', 1)->get();
        return view("backend.tables.notes.edit", compact("classeeleves", "matieres", "note"));
    }

    public function update(Request $request, $id) {

        $user = Auth::user();
        $note = Notes::find($id);

        $this->validate($request, [
            'classeeleve_id' => 'required',
           
        ]);
    
        $note->setAttribute("classeeleve_id", $request->classeeleve_id);
        $note->setAttribute("matiere_id", $request->matiere_id);
        $note->setAttribute("note1", $request->note1);
        $note->setAttribute("note2", $request->note2);
        $note->setAttribute("note3", $request->note3);
        $note->setAttribute("devoir1", $request->devoir1);
        $note->setAttribute("devoir2", $request->devoir2);
        $note->setAttribute("devoir3", $request->devoir3);
        $note->setAttribute("moyeninterro", $request->moyeninterro);
        $note->setAttribute("moyendevoir", $request->moyendevoir);
        $note->setAttribute("moyenne", $request->moyenne);
        $note->setAttribute("created_by", $user->id); 
        $note->setAttribute("statut_id", 1);
        $note->setAttribute("updated_at", new \DateTime()); 
        $note->update();

        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les notes : route("notes.index")
        return redirect(route("notes.index"));
     }

    
    public function destroy($id) { 

        $note = Notes::find($id);
        $note->setAttribute("statut_id", 2);
        $note->setAttribute("updated_at", new \DateTime()); 
        $note->update();


        return redirect(route('notes.index'));
       
    }
}
