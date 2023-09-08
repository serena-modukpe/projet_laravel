<?php

namespace App\Http\Controllers;
use App\Models\Classesites;
use App\Models\Sites;
use App\Models\Eleves;
use App\Models\Classeeleves;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ClasseelevesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
{
    $role_id = auth()->user()->getrole->id;
    //$eleves_id = auth()->user()->getclassesite->getuser->id;
    $user_id = Auth::id();

    if ($role_id == 1)
     {
        $classeeleves = Classeeleves::orderBy('created_at', 'desc')->get();
    } 
    else 
    {
       
        
        // Récupérer les classes d'élèves associées à l'utilisateur connecté à travers la relation existante
        $classeeleves = Classeeleves::whereHas('getclassesite', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->orderBy('created_at', 'desc')->get();
 
    }
    
   
    return view("backend.tables.classeeleves.index", compact("classeeleves"));
}




    public function create(){
        $eleves = Eleves::all();
        $classesites = Classesites::all();
        
        return view('backend.tables.classeeleves.create', compact('eleves', 'classesites'));
    }

    public function store(Request $request){

        $request->validate([
            'eleve_id' => 'required',
            'date', 'before_or_equal:today'
        ]);


        $existeclasseeleve = Classeeleves::where('eleve_id', $request->eleve_id)
                                               ->where('annees', $request->annees)
                                               ->first();
    
        if ($existeclasseeleve) {
            // Une classematiere avec la même combinaison matiere_id et classesite_id existe déjà
            Alert::error('Erreur', 'Un eleve avec cette année existe déjà.');
            return redirect()->route("classeeleves.index");
        }

    
      $classeeleves = new Classeeleves();
      $classeeleves->setAttribute("eleve_id", $request->eleve_id);
      $classeeleves->setAttribute("classesite_id", $request->classesite_id);
      $classeeleves->setAttribute("annees", $request->annees);
      $classeeleves->setAttribute("statut_id", 1);
      $classeeleves->setAttribute("created_at", new \DateTime()); 
      
      $classeeleves->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      return redirect()->route("classeeleves.index");

    }

    public function edit($id) {

        $classeeleve = Classeeleves::find($id);
        $eleves = Eleves::all();
        $classesites = Classesites::all();
        return view("backend.tables.classeeleves.edit", compact("classeeleve", "eleves", "classesites", "sites"));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'eleve_id' => 'required',
          
        ]);

        $existeclasseeleve = Classeeleves::where('eleve_id', $request->eleve_id)
                                               ->where('annees', $request->annees)
                                               ->first();
    
        if ($existeclasseeleve) {
            // Une classematiere avec la même combinaison matiere_id et classesite_id existe déjà
            Alert::error('Erreur', 'Un eleve avec cette année existe déjà.');
            return redirect()->route("classeeleves.index");
        }

    
        $classeeleve->setAttribute("eleve_id", $request->eleve_id);
        $classeeleve->setAttribute("classesite_id", $request->classesite_id);
        $classeeleve->setAttribute("annees", $request->annees);
        $classeeleve->setAttribute("updated_at", new \DateTime()); 
        $classeeleve->update();

        Alert::success('Félicitatiions', 'modification effectuée avec succès');
        // 4. On retourne vers tous les classesites : route("classesites.index")
        return redirect(route("classeeleves.index"));
     }

    
    public function destroy($id) { 

    
      

            $classeeleves = Classeeleves::find($id);
            $classeeleves->setAttribute("statut_id", 2);
            $classeeleves->setAttribute("updated_at", new \DateTime()); 
            $classeeleves->update();
            Alert::success('Félicitations', 'suppression effectuée avec succès');
        
       
        return redirect(route('classeeleves.index'));
    }
    
}
