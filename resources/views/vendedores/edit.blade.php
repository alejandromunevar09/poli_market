@extends('layouts.app')

@section('content')
<h2>Editar Vendedores</h2>

@if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li style="color: red;">{ '{' } $error { '}' }</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{ '{ route('vendedores.update', $vendedore->id) }' }" method="POST">
  @csrf
  @method('PUT')

  <label>Nombre:</label><br>
  <input type="text" name="nombre" value="{ '{ old('nombre', $vendedore->nombre) }' }"><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" value="{ '{ old('email', $vendedore->email) }' }"><br><br>

  <button type="submit">Actualizar</button>
</form>

<a href="{ '{ route('vendedores.index') }' }">← Volver al listado</a>
@endsection
