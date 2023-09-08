<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissements extends Model
{
    use HasFactory;
    protected $table = 'etablissements';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'sigle',
        'nom',
        'adresse',
        "anneecreation",
        "logo",
        "telephone",
        "statut_id",
    ];
   

    
    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }  

}

