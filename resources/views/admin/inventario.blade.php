@extends('admin.admin')
@section('inventario')
<div class="row mb-2">
	<div class="col-sm-9">
		<h1 class="m-0 text-dark">Gestiona Tu Inventario</h1>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('inventario_content')
<div class="row mb-2">
<input class="btn btn-info btn-sm" type="submit"  value="Buscar" id="buscar_repuesto_inventario">
<input class="btn btn-danger btn-sm" type="submit"  value="Volver" id="volver_a_inventario">
</div>
<div class="row"><!-----fila de BUSCADOR EN INVENTARIO ----->
				<input id="buscar_codigos_inventario" name="buscar_codigos_inventario" type="text" placeholder="Codigo" class="form-control input-sm col-sm-2" required>
				<input id="buscar_descripcion_inventario" name="buscar_descripcion_inventario" type="text" placeholder="Descripcion" class="form-control input-sm col-sm-2">
				<input id="buscar_marca_inventario" name="buscar_marca_inventario" type="text" placeholder="Marca" class="form-control input-sm col-sm-2">
				<input id="buscar_modelo_inventario" name="buscar_modelo_inventario" type="text" placeholder="Modelo" class="form-control input-sm col-sm-2">
				<input id="buscar_anio_inventario" name="buscar_anio_inventario" type="text" placeholder="Anio" class="form-control input-sm col-sm-2">
				<input id="buscar_marcaR_inventario" name="buscar_marcaR_inventario" type="text" placeholder="Marca_R" class="form-control input-sm col-sm-2">
				<input id="procedencia" name="procedencia" type="text" placeholder="Procedencia" class="form-control input-sm col-sm-2">
				<input id="costo" name="costo" type="text" placeholder="Costo" class="form-control input-sm col-sm-2">
				<input id="pvp" name="pvp" type="text" placeholder="PVP" class="form-control input-sm col-sm-2">
				<input id="cantidad" name="cantidad" type="text" placeholder="Cantidad" class="form-control input-sm col-sm-2">
</div> <!----- fin de fila de BUSCADOR EN INVENTARIO ----->
<div class="row mb-2">
<input class="btn btn-primary btn-sm" type="submit"  value="Adicionar" id="adicionar col-sm-2">
</div>
<div class="row mb-2">
	<table class="table table-sm table-striped table-bordered table-hover table-condensed">
		<thead>
			<tr class="table-info">
				<th>Id</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>MarcaV</th>
				<th>Modelo</th>
				<th>Año</th>
				<th>MarcaR</th>
				<th>Procedencia</th>
				<th>Costo</th>
				<th>PVP</th>
				<th>Cantidad</th>
			</tr>
		</thead>
		<tbody id="cuerpo_inventario">
			 @foreach ($articulos as $articulo)
            <tr>
              <td>{{$articulo->id}}</td>
              <td>{{$articulo->codigo}}</td>
              <td>{{$articulo->descripcion}}</td>
              <td>{{$articulo->marca}}</td>
              <td>{{$articulo->modelo}}</td>
              <td>{{$articulo->anio}}</td>
              <td>{{$articulo->marca_r}}</td>
              <td>{{$articulo->procedencia}}</td>
              <td>{{$articulo->costo}}</td>
              <td>{{$articulo->pvp}}</td>
              <td>{{$articulo->stock}}</td>
            </tr>
            @endforeach
		</tbody>              
	</table>
</div>
@endsection