<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Articulo extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'pedido_id',
        'producto_id',
        'cantidad',
        'tamano',
    ];

 public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
