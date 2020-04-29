@extends('admin.admin')
@section('perfil_user')
<div class="row mb-2">
	<div class="col-sm-9">
		<h1 class="m-0 text-dark">Configuración del perfil de {{ Auth::user()->name }}</h1>
	</div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('perfil_user_content')
<div class="row mb-2">
	<div class="col-sm-9">
		<p>Aquí van las configuraciones</p>
	</div>
</div>
@endsection