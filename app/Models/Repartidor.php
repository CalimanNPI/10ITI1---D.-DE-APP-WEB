<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido_pa',
        'apellido_ma',
        'edad',
        'vehiculo',
        'pago',
        'foto_repartidor',
        'user_id',
    ];

    protected $primaryKey = 'repartidor_id';
}
