<a href="{{ url( '/virtual_licenses/' )}}">Regresar</a>
<br>

<label for="name"> Nombres </label>
<input type="text" name="name" value="{{ isset($virtual_license->name)?$virtual_license->name:'' }}">
<br>

<label for="lastName"> Apellidos </label>
<input type="text" name="lastName" value="{{ isset($virtual_license->lastName)?$virtual_license->lastName:'' }}">
<br>

<label for="document"> Documento de identidad </label>
<input type="integer" name="document" value="{{ isset($virtual_license->document)?$virtual_license->document:'' }}">
<br>

<label for="program"> Programa de formación </label>
<input type="text" name="program" value="{{ isset($virtual_license->program)?$virtual_license->program:'' }}">
<br>

<label for="photo"> Foto </label>
@if(isset($virtual_license->photo))
<div class="container-img">
    <img src="{{ asset('storage').'/'.$virtual_license->photo }}" alt="">
</div>
@endif
<input type="file" name="photo">
<br>

<input type="submit" value="{{$action}}">
