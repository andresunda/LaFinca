<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable
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
        ->logOnly(['nombre', 'apellido_paterno','apellido_materno', 'teléfono'])
        ->useLogName($name)
        ->setDescriptionForEvent(fn(string $eventName) => "Se ha ".translate_description($eventName)." un usuario");
        // Chain fluent methods for configuration options
    }


    public function pedido(){
        return $this->hasMany(Pedido::class, 'id');
    }

    public function autentificacion(){
        return $this->hasOne(Autentificacion::class);
        } 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
