@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('virtual_licenses')}}" method="post" enctype="multipart/form-data">
    @csrf

    <h1>Formulario Registrar Datos Estudiante</h1>
    <div class="container-form">
    @include('virtual_licenses.form',['action'=>'Guardar'])
    </div>
</form>
</div>
@endsection
