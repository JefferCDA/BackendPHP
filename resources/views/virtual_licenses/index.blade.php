@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-inline">
        <a href="{{ url( '/virtual_licenses/create' )}}" class="btn btn-success">Crear Carnet</a>
        <a href="{{ url( '/virtual_licenses/create' )}}" class="btn btn-primary">Escanear QR</a>
    </div>


    </br>
    </br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Programa</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($virtual_licenses as $virtual_license)
            <tr>
                <td>{{ $virtual_license->id }}</td>
                <td>{{ $virtual_license->name }}</td>
                <td>{{ $virtual_license->lastName }}</td>
                <td>{{ $virtual_license->document }}</td>
                <td>{{ $virtual_license->program }}</td>
                <div class="container-img">
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$virtual_license->photo }}" width="100" alt="">
                    </td>
                </div>

                <td>
                    <a href="{{ url( '/virtual_licenses/'.$virtual_license->id.'/edit' ) }}" class="btn btn-warning">
                        Actualizar
                    </a>
                    |
                    <form action="{{ url( '/virtual_licenses/'.$virtual_license->id ) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Desea borrar el registro?')" class="btn btn-danger" value="Borrar">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
