@extends('admin.admin')
@section('contactos')
@if(Session::get('message'))
<div class="alert alert-success" role="alert">
{{Session::get('message')}}
</div>
@endif
<div class="row mb-2">
	<div class="col-sm-12">
		<h1 class="m-0 text-dark">Puedes contactarte por correo, teléfono y/o puedes verificar nuestra dirección </h1>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('contactos_content')
<div class="row">
	<div class="col-lg-5">
		<form id="formContacto" class="form-horizontal" action="{{ route('sendmail') }}" method="POST">
			@csrf
			<fieldset>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="nombre_contacto">Nombres</label>  
					<div>
						<input id="nombre_contacto" name="nombre_contacto" type="text" placeholder="Nombre y Apellido" class="form-control input-sm" required>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="telefono">Teléfono</label>  
					<div>
						<input id="telefono" name="telefono" type="text" placeholder="Teléfono" class="form-control input-sm" required>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="correo">Correo</label>  
					<div>
						<input id="correo" name="correo" type="text" placeholder="Correo Electrónico" class="form-control input-sm" required="">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group">
					<label class="control-label" for="mensaje">Comentarios</label>  
					<div class="">
						<textarea id="mensaje" name="mensaje" rows="7" cols="30" class="form-control input-sm" ></textarea>
					</div>
				</div>
				<!-- Button -->
				<div class="form-group">
					<div class="">
						<input class="btn btn-sm btn-primary" type="submit"  value="Enviar" id="enviar">
						<input class="btn btn-sm btn-danger" type="reset"  value="Borrar" id="borrar">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="col-lg-1"></div>
	<div class="col-lg-6">

		<b><p>Dir: Leonardo Fray Murialdo y 6 De Diciembre</p></b>
		<b><p>Telf: 0984492727/3280677</p></b>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.231520039764!2d-78.48864378273699!3d-0.1310745407250093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMDcnNTIuMCJTIDc4wrAyOCc0Ny42Ilc!5e0!3m2!1ses-419!2sec!4v1525822685682" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>
@endsection