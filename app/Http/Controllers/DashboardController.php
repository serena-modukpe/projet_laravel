<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Statuts;
use App\Models\Classes;
use App\Models\Etablissements;
use App\Models\Habilitations;
use App\Models\Matieres;

// Importez d'autres modèles si nécessaire

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
{
    //$data=User::all()
    $data = User::whereNotNull('id')->get();
    $countuser = $data->count();
   
   
    $data = Roles::whereNotNull('id')->get();
    $countrole = $data->count();

    $data = Statuts::whereNotNull('id')->get();
    $countstatut = $data->count();

    $data = Habilitations::whereNotNull('id')->get();
    $counthabilitations = $data->count();

    $data = Classes::whereNotNull('id')->get();
    $countclasse = $data->count();

    $data = Etablissements::whereNotNull('id')->get();
    $countetablissement = $data->count();

    $data = Matieres::whereNotNull('id')->get();
    $countmatiere = $data->count();

    

    return view('backend.dashboard', compact("countuser","countrole","countstatut","counthabilitations","countclasse","countetablissement","countmatiere"));
}
}