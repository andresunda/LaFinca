<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ventas;
use DB;
use Spatie\Activitylog\Models\Activity;


class VentasController extends Controller
{
    public function ventas(){
        return view ('ventas');
    }}
