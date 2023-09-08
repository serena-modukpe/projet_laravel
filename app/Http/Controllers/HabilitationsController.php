<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilitations;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HabilitationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1) {
            $habilitations = Habilitations::orderBy('created_at', 'desc')->get();
        } 
        else 
        {
            $habilitations = Habilitations::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
        }


    // On transmet les habilitations à la vue
        return view("backend.tables.habilitations.index", compact("habilitations"));
   
    }

    public function create() {
        $roles = Roles::all();
        return view('backend.tables.habilitations.create', compact("roles"));
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
           
            'role_id' => 'required',
           
           
        ]);

    
        $habilitations = new Habilitations();
        $habilitations->setAttribute("create", $request->has('create'));
        $habilitations->setAttribute("read", $request->has('read'));
        $habilitations->setAttribute("update", $request->has('update'));
        $habilitations->setAttribute("delete", $request->has('delete'));
        $habilitations->setAttribute("description", $request->description);
        $habilitations->setAttribute("role_id", $request->role_id);
        $habilitations->setAttribute("statut_id", 1); 
        $habilitations->setAttribute("created_at", new \DateTime()); 
        $habilitations->save();
        Alert::success('Félicitations', 'enregistrement réussi');
        // 4. On retourne vers tous les habilitations : route("habilitations.index")
        return redirect()->route("habilitations.index");
     }

     public function show(Habilitations $habilitation) { }

    public function edit($id) {
        $roles = Roles::all();
        $habilitation = Habilitations::find($id);
        return view("backend.tables.habilitations.edit", compact("habilitation", "roles"));
    }

    public function update(Request $request, $id) {

        $habilitation = Habilitations::find($id);

        $this->validate($request, [
            'role_id' => 'required',
        ]);
    
        $habilitation->setAttribute("create", $request->has('create'));
        $habilitation->setAttribute("read", $request->has('read'));
        $habilitation->setAttribute("update", $request->has('update'));
        $habilitation->setAttribute("delete", $request->has('delete'));
        $habilitation->setAttribute("description", $request->description);
        $habilitation->setAttribute("role_id", $request->role_id);
        $habilitation->setAttribute("statut_id", 1); 
        $habilitation->setAttribute("updated_at", new \DateTime()); 
        $habilitation->update();
        Alert::success('Félicitations', 'modification effectuée avec succès');

        // 4. On retourne vers tous les habilitations : route("habilitations.index")
        return redirect(route("habilitations.index"));
     }

    public function destroy($id) { 

        $habilitations = Habilitations::find($id);
        $habilitations->setAttribute("statut_id", 2);
        $habilitations->setAttribute("updated_at", new \DateTime()); 
        $habilitations->update();

      
        return redirect(route('habilitations.index'));
    }
}