<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Venta extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'id',
        'folio_pedido_id',
    ];

    public function pedido(){
        return $this->belongsTo(Pedidos::class, 'id');
    }
}
