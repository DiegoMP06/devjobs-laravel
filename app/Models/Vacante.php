<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ["ultimo_dia"];

    protected $fillable = [
        'titulo',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'publicado',
        'categoria_id',
        'salario_id',
        'user_id',
    ];

    public function formatearFecha(String $formato = 'd/m/Y')
    {
        return Carbon::parse($this->ultimo_dia)->format($formato);
    }

    public function fechaString()
    {
        return Carbon::parse($this->ultimo_dia)->toFormattedDateString();
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'email', 'rol']);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'DESC');
    }
}
