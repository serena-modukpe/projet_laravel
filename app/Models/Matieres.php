<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sites;
use App\Models\Statuts;


class Matieres extends Model
{
    use HasFactory;
    protected $fillable = [ "libelle", "description", "coefficient",'statut_id',];

    
    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }
    
    
}
