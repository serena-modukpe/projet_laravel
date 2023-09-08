<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Statuts;
use App\Models\Etablissements;
class Sites extends Model
{
    use HasFactory;
    protected $fillable = [ "nom","user_id", "etablissement_id",'statut_id'];




    public function getuser() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function getetablissement() 
    {
        return $this->belongsTo(Etablissements::class, 'etablissement_id', 'id');
    }

    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }


    
    
    
    
  
   


}


