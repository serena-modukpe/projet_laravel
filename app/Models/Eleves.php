<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleves extends Model
{
    use HasFactory;
    protected $fillable = [
        'numat',
        'nom',
        'prenom',
        'date_naissance',
        'telephone',
        
    ];

    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }
}
