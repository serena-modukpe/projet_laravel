<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Matieres;
use App\Models\Sites;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class MatieresController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1) {
            $matieres = Matieres::orderBy('created_at', 'desc')->get();
        } else {
            $matieres = Matieres::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
        }


    // On transmet les statut à la vue
        return view("backend.tables.matieres.index", compact("matieres"));
   
    }

    public function create() {
        $sites = Sites::where('statut_id', 1)->get();
        return view('backend.tables.matieres.create', compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:matieres,libelle|max:255',
           
        ]);
    
        $matieres = new Matieres();
        $matieres->setAttribute("libelle", $request->libelle);
        $matieres->setAttribute("description", $request->description);
        $matieres->setAttribute("coefficient", $request->coefficient);
        $matieres->setAttribute("statut_id", 1);
        $matieres->setAttribute("created_at", new \DateTime()); 
        $matieres->save();

        Alert::success('Félicitations', 'enregistrement réussi');
        // 4. On retourne vers tous les matieres : route("matieres.index")
        return redirect()->route("matieres.index");
     }

     

    public function edit($id) {
        $sites = Sites::all();
        $matiere = Matieres::find($id);
        return view("backend.tables.matieres.edit", compact("matiere", "sites"));
    }

    public function update(Request $request, $id) {

        $matiere = Matieres::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $matiere->setAttribute("libelle", $request->libelle);
        $matiere->setAttribute("description", $request->description);
        $matiere->setAttribute("coefficient", $request->coefficient);
        $matiere->setAttribute("updated_at", new \DateTime()); 
        $matiere->update();
        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les matieres : route("matieres.index")
        return redirect(route("matieres.index"));
     }

    public function destroy($id) { 
        
        
        $matiere = Matieres::find($id);
        $matiere->setAttribute("statut_id", 2);
        $matiere->setAttribute("updated_at", new \DateTime()); 
        $matiere->update();

        //Classematieres

        $destroyclassematiere = DB::table('classematieres')->where('site_id', '=', $id)->update(array('statut_id' => 2));

            return redirect()->route('matieres.index');
        
    }
}
