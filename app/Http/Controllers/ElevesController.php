<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


use App\Models\Eleves;


class ElevesController extends Controller
{
    //
    public function index()
    {
   
            
            $role_id = auth()->user()->getrole->id;
    
        if ($role_id == 1) {
            $eleves = Eleves::orderBy('created_at', 'desc')->get();
        } 
        else 
        {
            $eleves = Eleves::where('statut_id', 1)->orderBy('created_at', 'desc')->get();
        }

        


    // On transmet les elev$eleves à la vue
    

        if(request()->ajax()) {
            return datatables()->of(Eleves::select('*'))
            ->addColumn('action', 'companies.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
            }
        return view("backend.tables.eleves.index", compact("eleves"));
   
    }

    public function create() {

         // Génération du numéro matricule
         $lastMatricule = Eleves::max('numat');
         $num = (int) substr($lastMatricule, 1);
         $nouveauNumMatricule = 'A' . str_pad($num + 1, 4, '0', STR_PAD_LEFT);
 
       
        return view('backend.tables.eleves.create', ['nouveauNumMatricule' => $nouveauNumMatricule]);
     }

     public function store(Request $request) {
        // Convertir le nom en majuscules 
        $request->merge(['nom' => strtoupper($request->input('nom'))]);
        //Mettre la premiere en majuscules
        $request->merge(['prenom' => ucfirst($request->input('prenom'))]);

    
        // Validation
        $this->validate($request, [
            'numat' => 'required|unique:eleves,numat',
            'nom' => 'required|max:255|regex:/^[A-Z]+$/',
            'prenom' => 'required|max:255|regex:/^[A-Z]+$/',
            'telephone' => 'regex:/^[0-9 +]+$/',
        ]);
    
        $eleves = new Eleves();
    
        // Enregistrement des autres données de l'élève
        // ...
    
        $eleves->setAttribute("numat", $request->numat);
        $eleves->setAttribute("nom", $request->nom);
        $eleves->setAttribute("prenom", $request->prenom);
        $eleves->setAttribute("date_naissance", $request->date_naissance);
        $eleves->setAttribute("telephone", $request->telephone);
        $eleves->setAttribute("statut_id", 1);
        $eleves->setAttribute("created_at", new \DateTime()); 
        $eleves->save();
    
        Alert::success('Félicitations', 'enregistrement réussi');
        // 4. On retourne vers tous les eleves : route("eleves.index")
        return redirect()->route("eleves.index");
    }
    

     public function show(Eleves $eleve) { }

    public function edit($id) {
        $request->merge(['nom' => strtoupper($request->input('nom'))]);
        $eleve = Eleves::find($id);
        return view("backend.tables.eleves.edit", compact("eleve"));
    }

    public function update(Request $request, $id) {

        $eleve = Eleves::find($id);

        $this->validate($request, [
            'numat' => 'required',
            'nom' => 'required',
            'date', 'before_or_equal:today'
        ]);
    
        $eleve->setAttribute("numat", $request->numat);
        $eleve->setAttribute("nom", $request->nom);
        $eleve->setAttribute("prenom", $request->prenom);
        $eleve->setAttribute("date_naissance", $request->date_naissance);
        $eleve->setAttribute("telephone", $request->telephone);
        $eleve->setAttribute("updated_at", new \DateTime()); 
        $eleve->update();
        Alert::success('Félicitations', 'modification effectuée avec succès');

        // 4. On retourne vers tous les eleves : route("eleves.index")
        return redirect(route("eleves.index"));
     }

    public function destroy($id) { 

        $eleves = Eleves::find($id);
        $eleves->setAttribute("statut_id", 2);
        $eleves->setAttribute("updated_at", new \DateTime()); 
        $eleves->update();

      
        return redirect(route('eleves.index'));
    }





    

}


