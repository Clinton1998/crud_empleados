@extends('layouts.app')
@section('content')
	<app-component :lst-empleados="{{$empleados}}"></app-component>
@endsection('content')