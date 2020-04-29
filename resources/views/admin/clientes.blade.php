@extends('admin.admin')
@section('perfil_cliente')
<div class="row mb-2">
	<div class="col-sm-9">
		<h1 class="m-0 text-dark">Aquí puedes ver un listado de todos tus clientes y filtrarlos a tu gusto</h1>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('perfil_cliente_content')
  <!-- TABLA PARA MOSTRAR CLIENTES -->
  <div class="tab-pane " id="nav_clientes"><!----- INICIO  de PANEL CLIENTES ----->
  	<div class=".container"> <!----- CONTENEDOR PARA EL PANEL CLIENTES ----->
  		<div class="col-lg-12 table-responsive"> <!----- POSICION DE LA TABLA CLIENTES----->
  			<input class="btn btn-info btn-sm" type="submit"  value="Buscar" id="buscar_cliente">
  			<input class="btn btn-danger btn-sm" type="submit"  value="Volver" id="volver_a_tclientes">
  			<table class="table table-sm table-striped table-bordered table-hover">
  				<thead>
  				<tr class="info">
  					<th><input id="buscar_nombre_cliente" name="buscar_nombre_cliente" type="text" placeholder="Nombre" class="form-control input-sm" ></th>
  					<th><input id="buscar_apellido_cliente" name="buscar_apellido_cliente" type="text" placeholder="Apellido" class="form-control input-sm" ></th>
  					<th><input id="buscar_cedula_cliente" name="buscar_cedula_cliente" type="text" placeholder="Cédula" class="form-control input-sm"></th>
  					<th><input id="buscar_ciudad_cliente" name="buscar_ciudad_cliente" type="text" placeholder="Ciudad" class="form-control input-sm"></th>
  					<th><input id="buscar_sector_cliente" name="buscar_sector_cliente" type="text" placeholder="Sector" class="form-control input-sm"></th>
  					<th><input id="buscar_dir_cliente" name="buscar_dir_cliente" type="text" placeholder="Dirección" class="form-control input-sm"></th>
  					<th><input id="buscar_correo_cliente" name="buscar_correo_cliente" type="text" placeholder="Correo" class="form-control input-sm"></th>
  					<th><input id="buscar_telefono_cliente" name="buscra_telefono_cliente" type="text" placeholder="Telefono" class="form-control input-sm"></th>
  					<th><input id="buscar_user_cliente" name="buscar_user_cliente" type="text" placeholder="Usuario" class="form-control input-sm"></th>
  				</tr>
  				</thead>
  				<tbody id="cuerpo_tclientes">
  				</tbody>              
  			</table>
  			<table class="table table-sm table-striped table-bordered table-hover">
  				<thead>
  				<tr class="info">
            <th>Id</th>
  					<th>Nombre</th>
  					<th>Apellido</th>
  					<th>Cédula</th>
  					<th>Ciudad</th>
  					<th>Sector</th>
  					<th>Dirección</th>
  					<th>Correo</th>
  					<th>Teléfono</th>
  					<th>Usuario</th>
  				</tr>
  				</thead>
  				<tbody id="cuerpo_tclientes">
            @foreach ($clientes as $cliente)
            <tr class="info">
              <td>{{$cliente->id}}</td>
              <td>{{$cliente->nombre}}</td>
              <td>{{$cliente->apellido}}</td>
              <td>{{$cliente->cedula}}</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>{{$cliente->correo}}</td>
              <td>{{$cliente->telefono}}</td>
              <td>{{$cliente->usuario}}</td>
            </tr>
            @endforeach
  				</tbody>              
  			</table>
  		</div> <!----- fin de POSICIONADOR DE TABLA CLIENTES ----->
  	</div> <!----- fin de  de CONTENEDOR DE PANEL CLIENTES ----->
  </div> <!----- fin de  de PANEL CLIENTES ----->
@endsection