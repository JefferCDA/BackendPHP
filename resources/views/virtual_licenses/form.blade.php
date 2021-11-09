@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-group">
    <label for="name"> Nombres </label>
    <input type="text" class="form-control" name="name"
    value="{{ isset($virtual_license->name)?$virtual_license->name:'' }}">

    <label for="lastName"> Apellidos </label>
    <input type="text" class="form-control" name="lastName"
     value="{{ isset($virtual_license->lastName)?$virtual_license->lastName:'' }}">

    <label for="document"> Documento de identidad </label>
    <input type="integer" class="form-control" name="document"
     value="{{ isset($virtual_license->document)?$virtual_license->document:'' }}">

    <label for="program"> Programa de formación </label>
    <input type="text" class="form-control" name="program"
     value="{{ isset($virtual_license->program)?$virtual_license->program:'' }}">
</div>
<div class="form-group">
    @if(isset($virtual_license->photo))
    <div class="container-img">
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$virtual_license->photo }}" width="100" alt="">
    </div>
    @endif
    <input type="file" name="photo">
</div>
<input class="btn btn-success" type="submit" value="{{$action}}">

<a href="{{ url( '/virtual_licenses/' )}}" class="btn btn-primary">Cancelar</a>
