<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Eleves;

class Classeeleves extends Model
{
    use HasFactory;
    protected $fillable = ["classesite_id","eleve_id", "annees","statut_id"];

    public function getclassesite() 
    {
        return $this->belongsTo(Classesites::class, 'classesite_id', 'id');
    }

    public function geteleve()
    {
        return $this->belongsTo(Eleves::class, 'eleve_id', 'id');
    }
    

    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }
}
