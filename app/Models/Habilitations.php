<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;

class Habilitations extends Model
{
    use HasFactory;
    protected $fillable = [ "create", "read", "update", "delete", "description", "role_id" ,"statut_id"];

    public function getrole() 
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public function getstatut() 
    {
        return $this->belongsTo(Statuts::class, 'statut_id', 'id');
    }
}
