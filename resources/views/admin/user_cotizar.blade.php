@extends('admin.admin')
@section('user_cotizar')
@if(Session::get('message'))
<div class="alert alert-success" role="alert">
{{Session::get('message')}}
</div>
@endif
<div class="row mb-2">
	<div class="col-sm-9">
		<h1 class="m-0 text-dark">Envíanos Tus Cotizaciones</h1>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('user_cotizar_content')
      <div class="col-lg-12">
        <form id="formCotizaciones" class="form-horizontal" action="{{ route('sendcotizacion') }}" method="POST">
        	@csrf
            <!-- Text input-->
		   <div class="row">
            <div class="form-group col-lg-4">
              <label class="control-label" for="nombre_cotizacion">Nombre</label>  
              <div>
                <input id="nombre_cotizacion" name="nombre" type="text" placeholder="Nombre" class="form-control input-sm" required>
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group col-lg-4">
              <label class="control-label" for="apellido_cotizacion">Apellido</label>  
              <div>
                <input id="apellido_cotizacion" name="apellido" type="text" placeholder="Apellido" class="form-control input-sm" required>
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group col-lg-4">
              <label class="control-label" for="datos_vehiculo">Datos Del Vehículo</label>  
              <div >
                <input id="datos_vehiculo" name="datos_vehiculo" type="text" placeholder="Ingresa marca, modelo, año, cilindraje, etc. " class="form-control input-sm" required>
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group col-lg-4">
              <label class="control-label" for="chasis">Chasis</label>  
              <div>
                <input id="chasis" name="chasis" type="text" placeholder="Ingrese número de Chasis (opcional)" class="form-control input-sm">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group col-lg-4">
              <label class="control-label" for="telefono">Teléfono</label>  
              <div>
                <input id="telefono" name="telefono" type="text" placeholder="Celular" class="form-control input-sm" required="">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group col-lg-4">
              <label class="control-label" for="correo_cotizacion">Correo</label>  
              <div>
                <input id="correo_cotizacion" name="correo" type="text" placeholder="Correo Electrónico" class="form-control input-sm" required="">
              </div>
            </div>
            <!-- Text input-->
            <div class="form-group col-lg-8">
              <label class="control-label" for="mensaje">Repuestos</label>  
              <div class="">
                <textarea placeholder="Ingresa los repuestos que buscas" id="mensaje" name="mensaje" rows="10" cols="40" class="form-control" ></textarea>
              </div>
            </div>
           </div>
            <!-- Button -->
            <div class="form-group">
              <div class="">
                <input class="btn btn-sm btn-primary" type="submit"  value="Enviar Cotizacion" id="enviar_cotizacion">
                <input class="btn btn-sm btn-danger" type="reset"  value="Borrar Datos" id="borrar_cotizacion">
              </div>
            </div>
        </form>
      </div>
@endsection