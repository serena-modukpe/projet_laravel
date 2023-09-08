<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sites;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ClassesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {

        // Vérifie si l'utilisateur est connecté

        if (auth()->check()) {
            // Récupère le rôle de l'utilisateur
            $role_id = auth()->user()->getrole->id;
    
            // Vérifie si l'utilisateur a le rôle de gestionnaire (par exemple, rôle_id = 2)
            if ($role_id == 2) {
                // Si l'utilisateur a le rôle de gestionnaire, récupérer toutes les classes
                $classes = Classes::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
            } else {
                // Si l'utilisateur n'a pas le rôle de gestionnaire, récupérer seulement les classes avec le statut_id = 1
                $classes = Classes::orderBy('created_at', 'desc')->get();
            }
    
            // Retourne la vue avec les classes récupérées
            return view("backend.tables.classes.index", compact("classes"));
        } 
        else 
        {
            // L'utilisateur n'est pas connecté, afficher un message d'erreur et rediriger vers la page de connexion
            return redirect()->route('login')->withErrors('Vous devez vous connecter pour accéder à cette page.');
        }
    }
    

    public function create(){
        $sites = Sites::where('statut_id', 1)->get();
        return view('backend.tables.classes.create', compact( 'sites'));
    }

    public function store(Request $request){

        $request->validate([
            'sigle' => 'required',
            'libelle' => 'required|unique:classes,libelle',
        ]);

    
      $classes = new Classes();
      $classes->setAttribute("sigle", $request->sigle);
      $classes->setAttribute("libelle", $request->libelle);
      $classes->setAttribute("statut_id", 1);      
      $classes->setAttribute("created_at", new \DateTime()); 
      $save=$classes->save();
      Alert::success('Félicitations', 'enregistrement réussi');
      if (!$save)
      {
        Alert::error('Erreur', 'Cette classe existe déjà.');
          
        
      } 
      
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("classes.index");
      

    }

    

 

    public function edit($id) {

        $classe = Classes::find($id);
        $sites = Sites::all();
        return view("backend.tables.classes.edit", compact("classe", "sites",));
    }

    public function update(Request $request, $id) {

        $classe = Classes::find($id);

        $this->validate($request, [
            'sigle' => 'required',
        ]);
    
        $classe->setAttribute("sigle", $request->sigle);
        $classe->setAttribute("libelle", $request->libelle);
        $classe->setAttribute("statut_id", 1);
        $classe->setAttribute("updated_at", new \DateTime()); 
        $classe->update();

        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les classes : route("classes.index")
        return redirect(route("classes.index"));
     }

    
    public function destroy($id) { 

        $classe = Classes::find($id);
        $classe->setAttribute("statut_id", 2);
        $classe->setAttribute("updated_at", new \DateTime()); 
        $classe->update();

        //Classematieres

        $destroyclassematiere = DB::table('classematieres')->where('site_id', '=', $id)->update(array('statut_id' => 2));


        return redirect(route('classes.index'));
       
    }
    
}