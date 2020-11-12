@extends('layouts.app')
@section('content')
	<div class="row justify-content-center mt-2">
	<div class="col-6">
		<a href="{{ route('empleados.index')}}">Ver listado de empleados</a>
		<hr>
		<div class="card">
			@if(is_null($empleado->foto))
				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Sin_foto.svg/768px-Sin_foto.svg.png" class="card-img-top" alt="...">
			@else
				<img src="{{ route('empleados.foto',$empleado->foto)}}" class="card-img-top" alt="...">
			@endif
		
		<div class="card-body">
			<h2 class="text-primary">Código: {{$empleado->codigo}}	</h2>
			<h5 class="card-title">DNI: {{ $empleado->dni }} {{ $empleado->nombre }} {{ $empleado->apellido }}</h5>
			<p class="card-text">{{ $empleado->departamento }} - {{ $empleado->ciudad }}</p>
			<p>Direccion: {{ $empleado->direccion }}</p>
			<p>Fecha de nacimiento: {{ $empleado->fecha_nacimiento }}</p>
		</div>
		<div class="card-header">
			<form method="POST"  id="frmEliminar" action="{{ route('empleados.destroy',$empleado->id)}}">
				@csrf
				@method('DELETE')
			</form>
			<button type="submit" class="btn btn-danger" form="frmEliminar">Eliminar</button>

			<a href="{{ route('empleados.edit',$empleado->id)}}" class="btn btn-warning">Editar</a>
			
			
		</div>
	</div>
	</div>
	</div>
@endsection