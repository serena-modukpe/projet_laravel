<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matieres;
use App\Models\Classesites;
use App\Models\Sites;
class classematieres extends Model
{
    use HasFactory;
    protected $table = 'classematieres';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'matiere_id',
        'classe_id',
        'site_id',
        'statut_id',
    ];

    public function getmatiere() 
    {
        return $this->belongsTo(Matieres::class, 'matiere_id', 'id');
    }

    public function getclasse() 
    {
        return $this->belongsTo(Classes::class, 'classe_id', 'id');
    }

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }

    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }
}
