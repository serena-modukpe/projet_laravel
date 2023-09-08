<?php

namespace App\Models;
use App\Models\Sites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [ "libelle", "description","site_id" ,"statut_id"];


    public function getsite() 
{
    return $this->belongsTo(Sites::class, 'site_id', 'id');
}

public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }

}