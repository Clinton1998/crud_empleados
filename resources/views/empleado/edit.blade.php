@extends('layouts.app')
@section('content')
	<div class="row justify-content-center mt-2">
		<div class="col-6">
			<a href="{{ route('empleados.show',$empleado->id)}}">Volver</a>
			<hr>
			<div class="card">
				<div class="card-header">Editar empleado</div>
				<div class="card-body">

					<form method="POST" action="{{ route('empleados.update',$empleado->id)}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="codigo">Código</label>
						<input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo',$empleado->codigo)}}">
						@error('codigo')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre',$empleado->nombre)}}">

						@error('nombre')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="apellidos">Apellidos</label>
						<input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos',$empleado->apellidos)}}">

						@error('apellidos')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>



					<div class="form-group">
						<label for="direccion">Dirección</label>
						<input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion',$empleado->direccion)}}">

						@error('direccion')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="dni">DNI</label>
						<input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni',$empleado->dni)}}">

						@error('dni')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="fecha_nacimiento">Fecha de nacimiento</label>
						<input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento',$empleado->fecha_nacimiento)}}">

						@error('fecha_nacimiento')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="departamento">Departamento</label>
						<input type="text" class="form-control @error('departamento') is-invalid @enderror" id="departamento" name="departamento" value="{{ old('departamento',$empleado->departamento)}}">

						@error('departamento')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="ciudad">Ciudad</label>
						<input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="departamento" name="ciudad" value="{{ old('ciudad',$empleado->ciudad)}}">

						@error('ciudad')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>

					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">

						@error('foto')
							<div class="invalid-feedback">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>
					<button type="submit" class="btn btn-primary">Agregar</button>
					</form>
				</div>
			</div>

		</div>
	</div>
@endsection('content')