<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	
	protected $fillable = ['codigo','nombre','apellidos','direccion','dni','fecha_nacimiento','departamento','ciudad','foto'];
}
