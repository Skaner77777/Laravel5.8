@extends('plantilla')

@section('content')

<h1><center>Nuevo Producto</center></h1>
<div class="container">

	<form action="{{route('GuardarProducto')}}" method="POST">
		
	  @csrf
	  
		<div class="form-group">
			<label for="exampleInputPassword1">Nombre</label>
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
		</div>
	
		<!--Validacion-->
		@if($errors->first('nombre'))
		<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡El nombre del producto es requerido :C !</strong>
		</div>
		@endif

		<div class="form-group">
			<label for="exampleInputPassword1">Descripcion</label>
			<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion">
		</div>

		<!--Validacion-->
		@if($errors->first('descripcion'))
		<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡La descripcion del producto es requerido :C !</strong>
		</div>
		@endif

		<center>
        <button type="submit" class = "btn btn-success btn-block">AGREGAR</button>
        <a href="{{route('InicioProducto')}}" type="button" class="btn btn-danger btn-block">CANCELAR</a>
    	</center>

	</form>

</div>

@endsection