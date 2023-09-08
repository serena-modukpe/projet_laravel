<?php

namespace App\Models;
use App\Models\Sites;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuts extends Model
{
    use HasFactory;
    protected $fillable = [ "libelle", "description" ];

    public function getsite() 
    {
        return $this->belongsTo(Sites::class, 'site_id', 'id');
    }
}
