<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $fillable = [
        'classeeleve_id',
        'matiere_id',
        'note1',
        "note2",
        "note3",
        "devoir1",
        "devoir2",
        "devoir3",
        "moyeninterro",
        "moyendevoir",
        "moyenne",
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
