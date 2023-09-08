<?php

namespace App\Http\Controllers;
use App\Models\Inscription;
use App\Models\Sites;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class inscriptions extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index()
    {
        $role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1)
         {
            $inscriptions = Inscription::orderBy('created_at', 'desc')->get();
        } 
        else
         {
            $inscriptions = Inscription::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
        }
        

    // On transmet les statut à la vue
        return view("backend.tables.inscriptions.index", compact("inscriptions"));
   
    }

    public function create() {
        $sites = Sites::where('statut_id', 1)->get();
        return view('backend.tables.inscriptions.create', compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:inscriptions,libelle|max:255',
           
        ]);
    
        $inscriptions = new inscription();
        $inscriptions->setAttribute("libelle", $request->libelle);
        $inscriptions->setAttribute("description", $request->description);
        $inscriptions->setAttribute("site_id", $request->site_id);
        $inscriptions->setAttribute("statut_id", 1); 
        $inscriptions->setAttribute("created_at", new \DateTime()); 
        $inscriptions->save();
        Alert::success('Félicitations', 'enregistrement réussi');
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect()->route("inscriptions.index");
     }

     
    public function edit($id) {

        $sites = Sites::all();
        $inscriptions = Inscription::find($id);
        return view("backend.tables.inscriptions.edit", compact("inscriptions","sites"));
    }

    public function update(Request $request, $id) {

        $inscriptions = Inscription::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $inscriptions->setAttribute("libelle", $request->libelle);
        $inscriptions->setAttribute("description", $request->description);
        $inscriptions->setAttribute("site_id", $request->site_id);
        $inscriptions->setAttribute("updated_at", new \DateTime()); 
        $inscriptions->update();
        Alert::success('Félicitations', 'modification réussie');
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect(route("inscriptions.index"));
     }

    public function destroy(Inscription $inscription) { 

        $inscriptions = Inscriptions::find($id);
        $inscriptions->setAttribute("statut_id", 2);
        $inscriptions->setAttribute("updated_at", new \DateTime()); 
        $inscriptions->update();
        return redirect(route('inscriptions.index'));
    }
}
