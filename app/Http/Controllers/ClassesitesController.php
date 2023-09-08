<?php

namespace App\Http\Controllers;
use App\Models\Classesites;
use App\Models\Sites;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Classes;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class ClassesitesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
{
    $role_id = auth()->user()->getrole->id;

    if ($role_id == 1)
     {
        $classesites = Classesites::orderBy('created_at', 'desc')->get();
    } 
    else 
    {
        $classesites = Classesites::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
    }

    return view("backend.tables.classesites.index", compact("classesites"));
}


    

    public function create(){
        
        $sites = Sites::where('statut_id', 1)->get();
        $classes = Classes::all();
        $users = User::where('role_id', 4)->get();
        return view('backend.tables.classesites.create', compact('sites', 'classes', 'users'));
    }

    public function store(Request $request){

        $request->validate([
            'classe_id' => 'required',
            
        ]);

    $existeclassesites = Classesites::where('classe_id', $request->classe_id)->where('site_id', $request->site_id)->first();
      if ($existeclassesites) {
            // Une classematiere avec la même combinaison matiere_id et classesite_id existe déjà
            // Vous pouvez afficher un message d'erreur ou une alerte ici
            Alert::error('Erreur', 'la classe avec cet site existe déjà.');
            return redirect()->route("classesites.index");
      }
      $classesites = new Classesites();
      $classesites->setAttribute("classe_id", $request->classe_id);
      $classesites->setAttribute("site_id", $request->site_id);
      $classesites->setAttribute("effectif", $request->effectif);
      $classesites->setAttribute("user_id", $request->user_id);
      $classesites->setAttribute("statut_id", 1);
      $classesites->setAttribute("created_at", new \DateTime()); 
      
      $classesites->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      return redirect()->route("classesites.index");

    }

    public function edit($id) {

        $classesite = Classesites::find($id);
        $classes = Classes::all();
        $users = User::where('role_id', 4)->get();
        $sites = Sites::all();
        return view("backend.tables.classesites.edit", compact("classesite", "sites", "classes", "users"));
    }

    public function update(Request $request, $id) {

        $classesite = Classesites::find($id);

        $this->validate($request, [
            'classe_id' => 'required',
        ]);
    
        $classesite->setAttribute("classe_id", $request->classe_id);
        $classesite->setAttribute("effectif", $request->effectif);
        $classesite->setAttribute("site_id", $request->site_id);
        $classesite->setAttribute("user_id", $request->user_id);
        $classesite->setAttribute("statut_id", 1);
        $classesite->setAttribute("updated_at", new \DateTime()); 
        $classesite->update();

        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les classes : route("classes.index")
        return redirect(route("classesites.index"));
     }

    
    public function destroy($id) { 

       

            $classesites = Classesites::find($id);
            $classesites->setAttribute("statut_id", 2);
            $classesites->setAttribute("updated_at", new \DateTime()); 
            $classesites->update();


            $destroyclassematiere = DB::table('classematieres')->where('classesite_id', '=', $id)->update(array('statut_id' => 2));

            $destroyclasseeleve = DB::table('classeeleves')->where('classesite_id', $id)->update(array('statut_id' => 2));

            Alert::success('Félicitations', 'suppression effectuée avec succès');
            $destroyclassematiere = DB::table('classematieres')->where('classesite_id', '=', $id)->update(array('statut_id' => 2));

            

        

        return redirect(route('classesites.index'));
}
}
