<?php

namespace App\Http\Controllers;
use App\Models\Roles;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        /*$role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1) {
            $roles = Roles::orderBy('created_at', 'desc')->get();
        } else {
            $roles = Roles::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
        }*/
        $roles = Roles::orderBy('id', 'desc')->get();
        return view("backend.tables.roles.index", compact("roles"));
   
    }

    public function create() {
        
        return view('backend.tables.roles.create');
     }

    public function store(Request $request) {

          // 1. Validation

          $this->validate($request, [
            'libelle' => 'required|unique:roles,libelle|max:255',
           
        ]);
    
        $roles = new Roles();
        $roles->setAttribute("libelle", $request->libelle);
        $roles->setAttribute("description", $request->description);
        $roles->setAttribute("statut_id", 1);
        $roles->setAttribute("created_at", new \DateTime()); 
        $roles->save();
        if ($roles) {
            
            Alert::success('Félicitations', 'Enregistrement réussi');
        } else {
            
            Alert::error('Erreur', 'Une erreur s\'est produite lors de l\'enregistrement');
        }
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect()->route("roles.index");
     }

     public function show(Roles $role) { }

    public function edit($id) {
        
        $role = Roles::find($id);
        return view("backend.tables.roles.edit", compact("role"));
    }

    public function update(Request $request, $id) {

        $role = Roles::find($id);

        $this->validate($request, [
            'libelle' => 'required',
        ]);
    
        $role->setAttribute("libelle", $request->libelle);
        $role->setAttribute("description", $request->description);
        $role->setAttribute("updated_at", new \DateTime()); 
        $role->update();
        Alert::success('Félicitations', 'modification effectuée avec succès');
        // 4. On retourne vers tous les roles : route("roles.index")
        return redirect(route("roles.index"));
     }

    public function destroy($id) { 

        $role = Roles::find($id);
        $role->setAttribute("statut_id", 2);
        $role->setAttribute("updated_at", new \DateTime()); 
        $role->update();
        return redirect(route('roles.index'));
    }
}
