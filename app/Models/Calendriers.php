<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classesites;
use App\Models\Matieres;
use App\Models\User;

class Calendriers extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_devoir',
        'classesite_id',
        'matiere_id',
        'date_debut',
        'date_fin',
        'created_by',
        'statut_id',
    ];

    public function getclassesite() 
    {
        return $this->belongsTo(Classesites::class, 'classesite_id', 'id');
    }

    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }

    public function getcreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getmatiere() 
    {
        return $this->belongsTo(Matieres::class, 'matiere_id', 'id');
    }
}
