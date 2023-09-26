<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Producto extends Model
{
    use HasApiTokens, HasFactory, Notifiable,LogsActivity;

    protected $fillable = [
        'id',
        'nombre_producto',
        'descripcion',
        'img',
    ];


    public function getActivitylogOptions(): LogOptions
    {
        if(auth()->user()){
            $name = auth()->user()->nombre;
        }else{
            $name = "Sistema";
        }
        return LogOptions::defaults()
        ->logOnly(['nombre_producto', 'descripcion', 'img'])
        ->useLogName($name)
        ->setDescriptionForEvent(fn(string $eventName) => "Se ha ".translate_description($eventName)." un producto");
        // Chain fluent methods for configuration options
    }

    public function articulo(){
        return $this->hasMany(Articulo::class, 'id');
    }

    public function categoria(){
        return $this->hasOne(Categoria::class);
    }

    public function precio(){
        return $this->hasOne(Precio::class);
    }

}
