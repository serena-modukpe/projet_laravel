<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Matieres;
use App\Models\Classematieres;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ClassematieresController extends Controller
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
        $classematieres = Classematieres::orderBy('created_at', 'desc')->get();
    } 
    else 
    {
        $classematieres = Classematieres::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
    }

    return view("backend.tables.classematieres.index", compact("classematieres"));
}


    

    public function create(){
        
        $matieres = Matieres::all();
        $sites = Sites::where('statut_id', 1)->get();
        $classes = Classes::all();
        return view('backend.tables.classematieres.create', compact('matieres', 'classes', "sites"));
    }

    public function store(Request $request){

        $request->validate([
            'matiere_id' => 'required',
            'classe_id' => 'required',
        ]);
    
        // Vérification si une classematiere avec la même combinaison matiere_id et classe_id existe déjà
        $existeclassematiere = Classematieres::where('site_id', $request->site_id)
                                               ->where('classe_id', $request->classe_id)
                                               ->where('matiere_id', $request->matiere_id)
                                               ->first();
    
        if ($existeclassematiere) {
            
            Alert::error('Erreur', 'Une classematiere avec cette matiere et classe existe déjà.');
            return redirect()->route("classematieres.index");
        }
    
        $classematieres = new Classematieres();
        $classematieres->setAttribute("matiere_id", $request->matiere_id);
        $classematieres->setAttribute("classe_id", $request->classe_id);
        $classematieres->setAttribute("site_id", $request->site_id);
        $classematieres->setAttribute("statut_id", 1);
        $classematieres->setAttribute("created_at", new \DateTime()); 
        
        $classematieres->save();
    
        Alert::success('Félicitations', 'enregistrement réussi');
        return redirect()->route("classematieres.index");
    }
    

    public function edit($id) {

        $classematiere = Classematieres::find($id);
        $matieres = Matieres::all();
        $classes = Classes::all();
        $sites = Sites::where('statut_id', 1)->get();
       
        return view("backend.tables.classematieres.edit", compact("classematiere", "matieres", "classes", "sites"));
    }

    public function update(Request $request, $id) {

        
        $classematiere = Classematieres::find($id);
        $matieres = Matieres::all();
        $classes = Classes::all();
        $sites = Sites::all();

        $this->validate($request, [
            'matiere_id' => 'required',
            'site_id' => 'required',
            'classe_id' => 'required',
        ]);

        $existeclassematiere = Classematieres::where('site_id', $request->site_id)
                                               ->where('classe_id', $request->classe_id)
                                               ->first();
    
        if ($existeclassematiere) {
            
            Alert::error('Erreur', 'Une classematiere avec cette matiere et classe existe déjà.');
            return redirect()->route("classematieres.index");
        }

    
        $classematiere->setAttribute("matiere_id", $request->matiere_id);
        $classematiere->setAttribute("classe_id", $request->classe_id);
        $classematiere->setAttribute("site_id", $request->site_id);
        $classematiere->setAttribute("updated_at", new \DateTime()); 
        $classematiere->update();

        Alert::success('Félicitatiions', 'modification effectuée avec succès');
        // 4. On retourne vers tous les classes : route("classes.index")
        return redirect(route("classematieres.index"));
     }

    
    public function destroy($id) { 
            $classematieres = Classematieres::find($id);
            $classematieres->setAttribute("statut_id", 2);
            $classematieres->setAttribute("updated_at", new \DateTime()); 
            $classematieres->update();
            Alert::success('Félicitations', 'suppression effectuée avec succès');
        
       
        return redirect(route('classematieres.index'));
    }
    
}
