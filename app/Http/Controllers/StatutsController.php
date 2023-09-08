<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Statuts;
use App\Models\Sites;
use RealRashid\SweetAlert\Facades\Alert;
class StatutsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //On récupère tous les STATUTS
        $statuts = Statuts:: orderBy('id', 'desc')->get();

    // On transmet les statuts à la vue
        return view("backend.tables.statuts.index", compact("statuts"));
   
    }
   
    public function create() {


        return view('backend.tables.statuts.create' );
     }

     public function store(Request $request) {

        // 1. Validation

        $this->validate($request, [
          'libelle' => 'required|unique:statuts,libelle|max:255',
         
      ]);
  
      $statuts = new Statuts();
      $statuts->setAttribute("libelle", $request->libelle);
      $statuts->setAttribute("description", $request->description);
      $statuts->setAttribute("created_at", new \DateTime()); 
      $statuts->save();
      Alert::success('Félicitations', 'enregistrement réussi');
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("statuts.index");
   }

   public function edit($id)

    {
        $statut = Statuts::find($id);
        $sites = Sites::all();
        return view("backend.tables.statuts.edit", compact("statut","sites"));
    }

    public function update(Request $request, $id) {

        $statut = Statuts::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $statut->setAttribute("libelle", $request->libelle);
        $statut->setAttribute("description", $request->description);
        $statut->setAttribute("updated_at", new \DateTime()); 
        $statut->update();
        Alert::success('Félicitatiions', 'modification effectuée avec succès');
        // 4. On retourne vers tous les statuts : route("statuts.index")
        return redirect()->route("statuts.index");
     }

    public function destroy(Statuts $statut) { 

        $statut = Statut::find($id);
        $statut->setAttribute("statut_id", 2);
        $statut->setAttribute("updated_at", new \DateTime()); 
        $statut->update();
        return redirect(route('statuts.index'));
    }

}
