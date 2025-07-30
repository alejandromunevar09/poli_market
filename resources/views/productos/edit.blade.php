@extends('layouts.app')

@section('content')
<h2>Editar Productos</h2>

@if ($errors->any())
  <div>
    <ul>
      @foreach ($errors->all() as $error)
        <li style="color: red;">{ '{' } $error { '}' }</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{ '{ route('productos.update', $producto->id) }' }" method="POST">
  @csrf
  @method('PUT')

  <label>Nombre:</label><br>
  <input type="text" name="nombre" value="{ '{ old('nombre', $producto->nombre) }' }"><br><br>

  <label>Email:</label><br>
  <input type="email" name="email" value="{ '{ old('email', $producto->email) }' }"><br><br>

  <button type="submit">Actualizar</button>
</form>

<a href="{ '{ route('productos.index') }' }">← Volver al listado</a>
@endsection
