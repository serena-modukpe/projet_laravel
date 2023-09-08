<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classesites extends Model
{
    use HasFactory;
    protected $fillable = [
        'classe_id',
        'effectif',
        'site_id',
        'statut_id',
        'user_id',
    ];


    public function getclasse() 
    {
        return $this->belongsTo(Classes::class, 'classe_id', 'id');
    }

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }


    public function getuser() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }
}
