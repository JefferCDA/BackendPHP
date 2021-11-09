@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url( '/virtual_licenses/'.$virtual_license->id ) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    <h1>Formulario actualizar Carnet Virtual</h1>
    <div class="container-form">
        @include('virtual_licenses.form',['action'=>'Actualizar'])
    </div>
</form>
</div>
@endsection
