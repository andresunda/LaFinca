<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Cliente extends Model
{
    use HasApiTokens, HasFactory, Notifiable,LogsActivity;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'teléfono',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        if(auth()->user()){
            $name = auth()->user()->nombre;
        }else{
            $name = "Sistema";
        }
        return LogOptions::defaults()
        ->logOnly(['nombre','apellido_paterno', 'apellido_materno', 'teléfono',])
        ->useLogName($name)
        ->setDescriptionForEvent(fn(string $eventName) => "Se ha ".translate_description($eventName)." un cliente");
        // Chain fluent methods for configuration options
    }


// Para definir la relación creamos un método en el modelo, 
   //podemos colocar el nombre que deseemos a la relación, 
   //sin embargo recomiendo que usemos el nombre de la tabla a la que queremos relacionar (hacia pedidos) un pedido tiene unicamente un cliente
    
   public function pedido(){
        return $this->hasMany(Pedido::class, 'id');
    }
}
