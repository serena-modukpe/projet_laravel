<?php

namespace App\Http\Controllers;
use App\Models\Payement;
use App\Models\Sites;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class payements extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1) {
            $payements = Payement::orderBy('created_at', 'desc')->get();
        } else {
            $payements = Payement::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
        }


    // On transmet les statut à la vue
        return view("backend.tables.payements.index", compact("payements"));
   
    }

    public function create() {
        $sites = Sites::where('statut_id', 1)->get();
        return view('backend.tables.payements.create',compact("sites"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:payements,libelle|max:255',
           
        ]);
    
        $payements = new Payement();
        $payements->setAttribute("libelle", $request->libelle);
        $payements->setAttribute("description", $request->description);
        $payements->setAttribute("site_id", $request->site_id);
        $payements->setAttribute("statut_id", 1);
        $payements->setAttribute("created_at", new \DateTime()); 
        $payements->save();
        Alert::success('Félicitations', 'enregistrement réussi');
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect()->route("payements.index");
     }

    

    public function edit($id) {
        $sites = Sites::all();
        $payements = Payement::find($id);
        return view("backend.tables.payements.edit", compact("payements","sites"));
    }

    public function update(Request $request, $id) {

        $payements = Payement::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $payements->setAttribute("libelle", $request->libelle);
        $payements->setAttribute("description", $request->description);
        $payements->setAttribute("site_id", $request->site_id);
        $payements->setAttribute("updated_at", new \DateTime()); 
        $payements->update();
        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect(route("payements.index"));
     }

    public function destroy(Payement $payement) { 

        $payement = Payement::find($id);
        $payement->setAttribute("statut_id", 2);
        $payement->setAttribute("updated_at", new \DateTime()); 
        $payement->update();
    
        // Redirection route "statuts.index"
        return redirect(route('payements.index'));
    }
}
