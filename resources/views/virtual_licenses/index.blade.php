@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ url( '/virtual_licenses/create' )}}">Crear Carnet</a>
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
                        <img src="{{ asset('storage').'/'.$virtual_license->photo }}" alt="">
                    </td>
                </div>

                <td>
                    <a href="{{ url( '/virtual_licenses/'.$virtual_license->id.'/edit' ) }}">
                        Actualizar
                    </a>
                    |
                    <form action="{{ url( '/virtual_licenses/'.$virtual_license->id ) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Desea borrar el registro?')" value="Borrar">
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
