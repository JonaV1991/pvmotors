@extends('admin.admin')
@section('tienda')
<div class="row mb-2">
	<div class="col-sm-9">
		<h1 class="m-0 text-dark">Gestiona Tu Carrito De Compras</h1>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('tienda_content')
<div class="row mb-2">
<input class="btn btn-info btn-sm" type="submit"  value="Buscar" id="buscar_repuesto_inventario">
<input class="btn btn-danger btn-sm" type="submit"  value="Volver" id="volver_a_inventario">
</div>
<form action="">
	<div class="row mb-4"><!-----fila de BUSCADOR EN INVENTARIO ----->
		<input id="buscar_codigos_inventario" name="buscar_codigos_inventario" type="text" placeholder="Codigo" class="form-control input-sm col-sm-2" required>
		<input id="buscar_descripcion_inventario" name="buscar_descripcion_inventario" type="text" placeholder="Descripcion" class="form-control input-sm col-sm-2">
		<input id="buscar_marca_inventario" name="buscar_marca_inventario" type="text" placeholder="Marca" class="form-control input-sm col-sm-2">
		<input id="buscar_modelo_inventario" name="buscar_modelo_inventario" type="text" placeholder="Modelo" class="form-control input-sm col-sm-2">
		<input id="buscar_anio_inventario" name="buscar_anio_inventario" type="text" placeholder="Anio" class="form-control input-sm col-sm-2">
		<input id="buscar_marcaR_inventario" name="buscar_marcaR_inventario" type="text" placeholder="Marca_R" class="form-control input-sm col-sm-2">
		<!-----<input id="procedencia" name="procedencia" type="text" placeholder="Procedencia" class="form-control input-sm col-sm-2">----->
	</div> <!----- fin de fila de BUSCADOR EN INVENTARIO ----->
</form>
<div class="row mb-2">
	<table class="table table-sm table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr class="table-info">
				<th>Código</th>
				<th>Descripción</th>
				<th>MarcaV</th>
				<th>Modelo</th>
				<th>Año</th>
				<th>MarcaR</th>
				<th>PVP</th>
				<th>Stock</th>
				<th>Comprar</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody id="cuerpo_inventario">
			 @foreach ($articulos as $articulo)
            <tr>
              <td>{{$articulo->codigo}}</td>
              <td>{{$articulo->descripcion}}</td>
              <td>{{$articulo->marca}}</td>
              <td>{{$articulo->modelo}}</td>
              <td>{{$articulo->anio}}</td>
              <td>{{$articulo->marca_r}}</td>
              <td>{{$articulo->pvp}}</td>
              <td>{{$articulo->stock}}</td>
              <td><input id="cantidad_pedido" name="cantidad_pedido" type="number" value="1" min=1 max="{{$articulo->stock}}" class="form-control input-sm"></td>
              <td>
              	<button class="btn btn-sm btn-primary comprarBtnUsuarios"><i class="fas fa-dollar-sign"></i></button>
              	<button class="btn btn-sm btn-success addCarrito"><i class="fas fa-plus"></i></button>
              </td>
            </tr>
            @endforeach
		</tbody>              
	</table>
</div>
@endsection