@extends('layouts.app')

@section('content')
<h2>Registrar Vendedores</h2>

@if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li style="color: red;">{ '{' } $error { '}' }</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{ '{ route('vendedores.store') }' }" method="POST">
  @csrf

  <label>Nombre:</label><br>
  <input type="text" name="nombre" value="{ '{ old('nombre') }' }"><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" value="{ '{ old('email') }' }"><br><br>

  <button type="submit">Guardar</button>
</form>

<a href="{ '{ route('vendedores.index') }' }">← Volver al listado</a>
@endsection
