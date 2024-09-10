<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv',
        'user_id',
        'vacante_id'
    ];

    public function candidato()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'email', 'rol']);
    }

    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }
}