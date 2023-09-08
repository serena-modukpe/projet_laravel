<?php
namespace App\Http\Controllers;
use App\Models\Etablissements;
use Illuminate\Support\Facades\Storage;
use Alert ;

use Illuminate\Http\Request;

class EtablissementController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $role_id = auth()->user()->getrole->id;

    if ($role_id == 1) {
        $etablissements = Etablissements::orderBy('created_at', 'desc')->get();
    } else {
        $etablissements = Etablissements::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
    }
        return view("backend.tables.etablissements.index", compact("etablissements"));
    }

    public function create()
    {
        return view('backend.tables.etablissements.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|unique:etablissements,nom|max:255',
        ]);

        $image = $request->logo;
        $name_image = null;
        if (!empty($image)) {
            
            $allowedfileExtension = ['jpeg','jpg','webp','png','JPEG','Jpg','PNG','WEBP'];
            $extension_image = $image->getClientOriginalExtension();
            $check = in_array($extension_image, $allowedfileExtension);
            if ($check) {
                $name_image= "logo_" . date('Ymd-His') . '.' . $extension_image;
                $image->storeAs('etablissements', $name_image, 'public');
            } else {
                return redirect()->back()->with("error", "Echec de l'enregistrement de l'image");
            }
        }

        $etablissement = new Etablissements();
        $etablissement->setAttribute("nom", $request->nom);
        $etablissement->setAttribute("adresse", $request->adresse);
        $etablissement->setAttribute("sigle", $request->sigle);
        $etablissement->setAttribute("statut_id", 1);
        $etablissement->setAttribute("anneecreation", $request->anneecreation);
        $etablissement->setAttribute("logo", $name_image);
        $etablissement->setAttribute("telephone", $request->telephone);
        $etablissement->setAttribute("created_at", new \DateTime()); 
        $etablissement->save();

        Alert::success('Félicitations', 'enregistrement réussi');
        return redirect()->route("etablissements.index");
    }



    public function edit($id)
    
    {
        $etablissement = Etablissements::find($id);
        return view("backend.tables.etablissements.edit", compact("etablissement"));
    }

    public function update(Request $request, $id)
    {
        $etablissement = Etablissements::find($id);

        $this->validate($request, [
            'nom' => 'required',
        ]);

        $image = $request->logo;
        $name_image = null;
        if (!empty($image)) {
            $allowedfileExtension = ['jpeg','jpg','webp','png','JPEG','Jpg','PNG','WEBP'];
            $extension_image = $image->getClientOriginalExtension();
            $check = in_array($extension_image, $allowedfileExtension);
            if ($check) {
                $name_image= "logo_" . date('Ymd-His') . '.' . $extension_image;
                $image->storeAs('etablissements', $name_image, 'public');
            } else {
                return redirect()->back()->with("error", "Echec de l'enregistrement de l'image");
            }
        }

        $etablissement->nom = $request->nom;
        $etablissement->adresse = $request->adresse;
        $etablissement->sigle = $request->sigle;
        $etablissement->anneecreation = $request->anneecreation;
        $etablissement->logo = $name_image;
        $etablissement->telephone = $request->telephone;

        $etablissement->save();

        Alert::success('Félicitations', 'modification effectuée avec succès');

        return redirect()->route("etablissements.index");
    }

    public function destroy($id)
    {
        $etablissement = Etablissements::find($id);
        $etablissement->setAttribute("statut_id", 2);
        $etablissement->setAttribute("updated_at", new \DateTime()); 
        $etablissement->update();

        return redirect()->route('etablissements.index');
    }
}

