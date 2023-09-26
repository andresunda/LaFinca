<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Pedido extends Model
{

    use HasApiTokens, HasFactory, Notifiable,LogsActivity;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'cliente_id',
        'usuario_id',
        'status_pedido',
        'total_pedido',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        if(auth()->user()){
            $name = auth()->user()->nombre;
        }else{
            $name = "Sistema";
        }
        return LogOptions::defaults()
        ->logOnly(['cliente_id', 'usuario_id','status_pedido','total_pedido', 'tipo_consumo',])
        ->useLogName($name)
        ->setDescriptionForEvent(fn(string $eventName) => "Se ha ".translate_description($eventName)." un pedido");
        // Chain fluent methods for configuration options
    }


   // Para definir la relación creamos un método en el modelo, 
   //podemos colocar el nombre que deseemos a la relación, 
   //sin embargo recomiendo que usemos el nombre de la tabla a la que queremos relacionar (hacia clientes) Un cliente podra tener muchos pedidos

   public function cliente(){
    return $this->belongsTo(Cliente::class);
    }

    public function articulo(){
        return $this->hasMany(Articulo::class);
    }
    
   public function usuario(){
    return $this->belongsTo(User::class);
    } 

    public function venta(){
     return $this->belongsTo(Venta::class);
     }   
    
    public function nota(){
        return $this->hasOne(Nota::class);
    }

    public function consumo(){
        return $this->hasOne(Consumo::class);
    }   



    
  
}
