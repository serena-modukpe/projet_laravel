<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interrogations extends Model
{
    use HasFactory;
    protected $fillable = [
        'classeeleve_id',
        'matiere_id',
        'note',
        "statut_id",
    ];

    public function getclasseeleve() 
    {
        return $this->belongsTo(Classeeleves::class, 'classeeleve_id', 'id');
    }

    public function getmatiere() 
    {
        return $this->belongsTo(Matieres::class, 'matiere_id', 'id');
    }
    
    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }

    public function getcreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
