<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Sites;
use App\Models\Etablissements;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SitesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index() {
        $role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1) {
            $sites = Sites::orderBy('created_at', 'desc')->get();
        } else {
            $sites = Sites::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
    
        }
        // On transmet les sites à la vue
        return view("backend.tables.sites.index", compact("sites"));
    }
    

    public function create(){
        $etablissements = Etablissements::all();
        $users = User::where('role_id', 3)->get();
        return view('backend.tables.sites.create', compact('etablissements','users'));
    }

    public function store(Request $request){

        $request->validate([
            'nom' => 'required',

        ]);

    
      $sites = new Sites();
      $sites->setAttribute("nom", $request->nom);
      $sites->setAttribute("user_id", $request->user_id);
      $sites->setAttribute("etablissement_id", $request->etablissement_id);
      $sites->setAttribute("statut_id",1);
      $sites->setAttribute("created_at", new \DateTime()); 
      $sites->save();

      Alert::success('Félicitations', 'enregistrement réussi');
      // 4. On retourne vers tous les statuts : route("statuts.index")
      return redirect()->route("sites.index");
    }

    public function edit($id)
    {
        $etablissements = Etablissements::all();
        $users = User::where('role_id', 3)->get();
        $site = Sites::find($id);
        return view("backend.tables.sites.edit", compact("site","etablissements", "users"));
    }

    public function update(Request $request, $id)
{
    $site = Sites::find($id);

    $this->validate($request, [
        'nom' => 'required',
    ]);

    $site->setAttribute("nom", $request->nom);
    $site->setAttribute("user_id", $request->user_id); 
    $site->setAttribute("etablissement_id", $request->etablissement_id);
    $site->save();

    Alert::success('Félicitations', 'Modification effectuée avec succès');

    return redirect()->route("sites.index");
}


    public function destroy($id)
    {
        $site = Sites::find($id);
        $site->setAttribute("statut_id", 2);
        $site->setAttribute("updated_at", new \DateTime()); 
        $site->update();
        
        //classes

       // $destroyclasse = DB::table('classes')->where('site_id', '=', $id)->update(array('statut_id' => 2));

        //matieres

        //$destroymatiere = DB::table('matieres')->where('site_id', '=', $id)->update(array('statut_id' => 2));

        //classematieres

        $destroyclassematiere = DB::table('classematieres')->where('site_id', '=', $id)->update(array('statut_id' => 2));

        //classesites
        $destroyclassesite = DB::table('classesites')->where('site_id', '=', $id)->update(array('statut_id' => 2 ));

        //classeeleves
        $destroyclasseeleve = DB::table('classeeleves')->where('site_id', '=', $id)->update(array('statut_id' => 2));
        
        //payements

        //$destroypayement = DB::table('payements')->where('site_id', '=', $id)->update(array('statut_id' => 2));
       // $destroyclasseeleves = DB::table('classeeleves')->where('site_id', '=', $id)->update(array('statut_id' => 2));

        $sites = Sites::find($id);
        $sites->setAttribute("statut_id", 2);
        $sites->setAttribute("updated_at", new \DateTime()); 
        $sites->update();
        //habilitations
        //$destroyhabilitations = DB::table('habilitations')->where('site_id', '=', $id)->update(array('statut_id' => 2));
        //inscriptions
        $destroyinscriptions = DB::table('inscriptions')->where('site_id', '=', $id)->update(array('statut_id' => 2));
        //roles
        
        

        return redirect()->route('sites.index');
    }
}
