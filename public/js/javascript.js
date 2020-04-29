	$(document).ready(function(){

	$('.carousel').carousel({    //nos sirve para poner la velocidad con la que queremos pasar las imagenes del index
		interval:10000    
	})

	//Boton buscar EN TIENDA DE USUARIOS, realizamos las peticiones al servidor


	$('#buscar_repuesto_usuario').click(function(){

		var codigo = $('#buscar_codigos').val();
		var descripcion = $('#buscar_descripcion').val();
		var marca = $('#buscar_marca').val();
		var modelo = $('#buscar_modelo').val();
		var anio = $('#buscar_anio').val();
		var marca_r = $('#buscar_marcaR').val();


		$.ajax({

			url: 'controladores/tienda/buscar.php',
			type: 'POST',
			data: {codigo: codigo, descripcion: descripcion, marca: marca, modelo: modelo, anio: anio, marca_r:marca_r},

			success:function(data){


				$('#cuerpo_tienda_usuarios').html('');

				$.each(data, function(index, value){
					var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><td><input id="id'+value['id']+'" name="cantidad_pedido" type="number" value="1" min=1 max="'+value['cantidad']+'" "form-control input-sm"></td><td><button class="btn btn-primary comprarBtnUsuarios" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-usd"></i></button></td><td><button class="btn btn-success addCarritoUsuarios" data-itemuser = "'+value['id']+'"><i class="glyphicon glyphicon-plus"></i></button></td></tr>';
					$('#cuerpo_tienda_usuarios').append(fila);

				});

			},

			dataType: 'json',

		});
	});
	$('#volver_a_tienda_usuarios').click(function(){

		location.href="index.php";
	});

	//Boton buscar, realizamos las peticiones al servidor para presentar la tabla en el index sin registro de usuario


	$('#buscar_repuesto').click(function(){

		var codigo = $('#buscar_codigos').val();
		var descripcion = $('#buscar_descripcion').val();
		var marca = $('#buscar_marca').val();
		var modelo = $('#buscar_modelo').val();
		var anio = $('#buscar_anio').val();
		var marca_r = $('#buscar_marcaR').val();


		$.ajax({

			url: 'controladores/tienda/buscar.php',
			type: 'POST',
			data: {codigo: codigo, descripcion: descripcion, marca: marca, modelo: modelo, anio: anio, marca_r:marca_r},

			success:function(data){


				$('#cuerpo_tienda').html('');

				$.each(data, function(index, value){
					var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><input id="cantidad_pedido" name="cantidad_pedido" type="number" value="1" min=1 max="'+value['cantidad']+'" "form-control input-sm"></td><td><button class="btn btn-primary comprarBtnUsuarios" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-usd"></i></button></td><td><button class="btn btn-success addCarrito" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-plus"></i></button></td></tr>';
					$('#cuerpo_tienda').append(fila);

				});

			},

			dataType: 'json',

		});
	});
	$('#volver_a_tienda').click(function(){

		location.href="index.php";
	});


	//peticiones asincronas para el registro de usuarios
	$('#formRegistrar').on('submit',function(){
		
		var dataToSend= $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '../controladores/registrarse.php',
			data: dataToSend,
			success:function(data){

				console.log(data);

				if(data=='ok'){

					alert("Registro correcto");
					location.href="../extensiones/tienda.html";
				}

				else if(data=='nocoincide'){
					alert('contraseña no es igual');

				}
				else{

					alert('No se pudo registrar...Lo sentimos...')
				}

			},

			error:function(data){
				console.log(data);	
			}

		});

		return false;

	});


	// SE LISTA LOS ITEMS PARA LA TABLA DE LA TIENDA AL PUBLICO EN GENERAL
	$.ajax({
		url: 'controladores/tienda/tienda.php',
		type: 'get',

		success:function(data){

			$.each(data, function(index, value){
				var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><input id="cantidad_pedido" name="cantidad_pedido" type="number" value="0" min=1 max="'+value['cantidad']+'" "form-control input-sm"></td><td><button class="btn btn-primary comprarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-usd"></i></button></td><td><button class="btn btn-success addCarrito" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-plus"></i></button></td></tr>';
				$('#cuerpo_tienda').append(fila);
			});
		},
		dataType: 'json',
	});

	//SE SOLICITA QUE SEAN USUARIOS PARA PODER AGREGAR PRODUCTOS AL CARRITO
	$('tbody').on('click', '.addCarrito', function(){	 	

		alert("Por favor registrate o inicia sesion\n para poder agregar productos al carrito");
	});

	 // SE LISTA LOS ITEMS PARA LA TABLA DE LA TIENDA A USUARIOS REGISTRADOS
	 $.ajax({
	 	url: 'controladores/tienda/tienda.php',
	 	type: 'get',

	 	success:function(data){
	 		
	 		$.each(data, function(index, value){
	 			var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><input id="id'+value['id']+'" name="cantidad_pedido" type="number" value="1" min=1 max="'+value['cantidad']+'" "form-control input-sm"></td><td><button class="btn btn-primary comprarBtnUsuarios" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-usd"></i></button></td><td><button class="btn btn-success addCarritoUsuarios" data-itemuser = "'+value['id']+'"><i class="glyphicon glyphicon-plus"></i></button></td></tr>';
	 			$('#cuerpo_tienda_usuarios').append(fila);
	 		});
	 	},
	 	dataType: 'json',
	 });



	//Se lista los productos del carrito
	
	var idUser = $('#idUsuario').val();
	$.ajax({
		url: 'controladores/carrito/tabla_carrito.php',
		type: 'get',
		data: {idUser:idUser},

		success:function(data){

			 var data1 = data[0]; 
			 var data2 = data[1];
			 console.log(data1);

			$.each(data1, function(index, value){



				var fila = '<tr id="'+value['id_carrito']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td align="right">'+value['pvp']+'</td><td align="right">'+value['v_total']+'</td><td><input id="id'+value['id_carrito']+'" class="cantidad_carrito" name="cantidad_carrito" value="'+value['cantidad']+'" type="number" min="1" data-cantidad= "'+value['id_carrito']+'" class="form-control input-sm"></td><td><button class="btn btn-danger btn-sm quitarCarrito" data-item= "'+value['id_carrito']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';

				$('#cuerpo_tcarrito').append(fila);
	            

			});
			$.each(data2, function(index, value){
			$('#pie_tcarrito').html('');
	            var pie='<tr><td colspan="3" align="right">Total</td><td>'+value['total']+'</td><td><form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_cart"><input type="hidden" name="business" value="pvmotorscenter-facilitator@hotmail.com"><input type="hidden" name="lc" value="EC"><input type="hidden" name="item_name" value="CarritoCompleto"><input type="hidden" name="item_number" value="2" max="2"><input type="hidden" name="currency_code" value="USD"><input type="hidden" name="amount" value="'+value['total']+'"><input type="hidden" name="button_subtype" value="products"><input type="hidden" name="notify_url" id="notify_url" value="https://pvmotors.000webhostapp.com/controladores/datos_paypal.php"/><input type="hidden" name="return" value="https://pvmotors.000webhostapp.com/controladores/datos_paypal.php"><input type="hidden" name="cancel_return" value="https://pvmotors.000webhostapp.com"><input type="hidden" name="add" value="1"><input type="image" src="imagenes/boton-comprar.jpg" name="submit" ></form></td></tr>';
	            $('#pie_tcarrito').append(pie);
	            });



		},

		dataType: 'json',

	});
	//

			 $('tbody').on('change', '.cantidad_carrito', function(){	 	
	
		      var idCantidad = $(this).data('cantidad');
		      var value=$('#id'+idCantidad).val();
		      $('#id'+idCantidad).val(value);
		      
		      $.ajax({
	 		url: 'controladores/carrito/editar_cantidad.php',
	 		type: 'POST',
	 		data: {idCantidad: idCantidad, value:value, idUser:idUser},
	 		success:function(data){

	 				var data1 = data[0]; 
			 		var data2 = data[1];
			 		console.log(data1);
			 		$('#cuerpo_tcarrito').html('');

			$.each(data1, function(index, value){



				var fila = '<tr id="'+value['id_carrito']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td align="right">'+value['pvp']+'</td><td align="right">'+value['v_total']+'</td><td><input id="id'+value['id_carrito']+'" class="cantidad_carrito" name="cantidad_carrito" value="'+value['cantidad']+'" type="number" min="1" data-cantidad= "'+value['id_carrito']+'" class="form-control input-sm"></td><td><button class="btn btn-danger btn-sm quitarCarrito" data-item= "'+value['id_carrito']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';

				$('#cuerpo_tcarrito').append(fila);
	            

			});
			$.each(data2, function(index, value){
				$('#pie_tcarrito').html('');
	            var pie='<tr><td colspan="3" align="right">Total</td><td>'+value['total']+'</td></tr>';
	            $('#pie_tcarrito').append(pie);
	            });
	 		},
	 		dataType: 'json',
	 	});

		      
		      });

	

	//LE DAMOS FUNCION AL BOTON DE AGREGAR PRODUCTOS AL CARRITO PARA LOS USUARIOS REGISTRADOS
	$('tbody').on('click', '.addCarritoUsuarios', function(){	 	


		var idToAdd = $(this).data('itemuser');
		var idUser = $('#idUsuario').val();
		var cantidadPedido = $('#id'+idToAdd).val();
		alert(cantidadPedido);
		$.ajax({

			url: 'controladores/carrito/datos_carrito.php',
			type: 'GET',
			data: {idToAdd: idToAdd, idUser:idUser, cantidadPedido:cantidadPedido},

			success:function(data){

				var data1 = data[0]; 
			 	var data2 = data[1];



				alert("Item Agregado");
				$('#cuerpo_tcarrito').html('');
				$.each(data1, function(index, value){
					var fila = '<tr id="'+value['id_carrito']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td align="right">'+value['pvp']+'</td><td align="right">'+value['v_total']+'</td><td><input id="id'+value['id_carrito']+'" class="cantidad_carrito" name="cantidad_carrito" value="'+value['cantidad']+'" type="number" min="1" data-cantidad= "'+value['id_carrito']+'" class="form-control input-sm"></td><td><button class="btn btn-danger btn-sm quitarCarrito" data-item= "'+value['id_carrito']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';

				$('#cuerpo_tcarrito').append(fila);
	            $('#id'+idToAdd).val('1');

			});
			$.each(data2, function(index, value){
			$('#pie_tcarrito').html('');
	            var pie='<tr><td colspan="3" align="right">Total</td><td>'+value['total']+'</td></tr>';
	            $('#pie_tcarrito').append(pie);
	            });
					

					


				
		
	 	         

			},

			dataType: 'json',
		});



	});

	 // ELMINAR items del carrito
	 $('tbody').on('click', '.quitarCarrito', function(){	 	

	 	
	 	var idToDelete = $(this).data('item');
	 	var idUser = $('#idUsuario').val();

	 	$.ajax({
	 		url: 'controladores/carrito/quitar_datos.php',
	 		type: 'POST',
	 		data: {idToDelete: idToDelete, idUser:idUser},
	 		success:function(data){


	 			var data1 = data[0]; 
			 	var data2 = data[1];

				$('#cuerpo_tcarrito').html('');
				$.each(data1, function(index, value){
					var fila = '<tr id="'+value['id_carrito']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td align="right">'+value['pvp']+'</td><td align="right">'+value['v_total']+'</td><td><input id="id'+value['id_carrito']+'" class="cantidad_carrito" name="cantidad_carrito" value="'+value['cantidad']+'" type="number" min="1" data-cantidad= "'+value['id_carrito']+'" class="form-control input-sm"></td><td><button class="btn btn-danger btn-sm quitarCarrito" data-item= "'+value['id_carrito']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';

				$('#cuerpo_tcarrito').append(fila);

			});
			$.each(data2, function(index, value){
			$('#pie_tcarrito').html('');
	            var pie='<tr><td colspan="3" align="right">Total</td><td>'+value['total']+'</td></tr>';
	            $('#pie_tcarrito').append(pie);
	            });
				
	 		},
	 		dataType: 'json',
	 	});
	 });


	 



	 //se lista los items del inventario


	 $.ajax({
	 	url: '../controladores/inventarios/inventario.php',
	 	type: 'get',

	 	success:function(data){
	 		
	 		$.each(data, function(index, value){
	 			var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['procedencia']+'</td><td>'+value['costo']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td><td><button class="btn btn-warning addBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-pencil"></i></button></td></tr>';
	 			$('#cuerpo_inventario').append(fila);
	 		});
	 	},
	 	dataType: 'json',
	 });

	 // SE ADICIONA DATOS A LA TABLA INVENTARIO

	 $('#adicionar').click(function(){


	 	
	 	var codigo = $('#buscar_codigos_inventario').val();
	 	var descripcion = $('#buscar_descripcion_inventario').val();
	 	var marca = $('#buscar_marca_inventario').val();
	 	var modelo = $('#buscar_modelo_inventario').val();
	 	var anio = $('#buscar_anio_inventario').val();
	 	var marca_r = $('#buscar_marcaR_inventario').val();
	 	var procedencia = $('#procedencia').val();
	 	var costo = $('#costo').val();
	 	var pvp = $('#pvp').val();
	 	var cantidad = $('#cantidad').val();
		//var dataToSend= $(this).serialize();
		if(codigo=='' || descripcion==''|| marca==''||modelo=='' || anio=='' ||marca_r=='' ||procedencia==''||costo==''||pvp==''||cantidad==''){
			alert('Todos los campos son requeridos');

		}else{
			$.ajax({

				url: '../controladores/inventarios/adicionar.php',
				type: 'POST',
		 	//data: dataToSend,
		 	data: {codigo: codigo, descripcion:descripcion, marca:marca, modelo:modelo, anio:anio, marca_r:marca_r, procedencia:procedencia, costo:costo, pvp:pvp, cantidad:cantidad},
		 	success:function(data){

		 		var fila ='<tr id="'+data['id']+'"><td>'+ data['codigo'] +'</td><td>'+ data['descripcion'] +'</td><td>'+data['marca']+'</td><td>'+data['modelo']+'</td><td>'+data['anio']+'</td><td>'+data['marca_r']+'</td><td>'+data['procedencia']+'</td><td>'+data['costo']+'</td><td>'+data['pvp']+'</td><td>'+data['cantidad']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+data['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td><td><button class="btn btn-warning addBtn" data-item = "'+data['id']+'"><i class="glyphicon glyphicon-pencil"></i></button></td></tr>';
		 		$('#cuerpo_inventario').append(fila);
		 		$('#buscar_codigos_inventario').val('');
		 		$('#buscar_descripcion_inventario').val('');
		 		$('#buscar_marca_inventario').val('');
		 		$('#buscar_modelo_inventario').val('');
		 		$('#buscar_anio_inventario').val('');
		 		$('#buscar_marcaR_inventario').val('');
		 		$('#procedencia').val('');
		 		$('#costo').val('');
		 		$('#pvp').val('');
		 		$('#cantidad').val('');
		 	},

		 	dataType: 'json',
		 });
		}
	});

	// ELMINAR DATOS DE LA TABLA INVENTARIO
	$('tbody').on('click', '.eliminarBtn', function(){	 	

		var idToDelete = $(this).data('item');

		$.ajax({
			url: '../controladores/inventarios/eliminar.php',
			type: 'POST',
			data: {idToDelete: idToDelete},
			success:function(data){

				$('#cuerpo_inventario').html('');
				$.each(data, function(index, value){

					var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['procedencia']+'</td><td>'+value['costo']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td><td><button class="btn btn-warning addBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-pencil"></i></button></td></tr>';
					$('#cuerpo_inventario').append(fila);
				});

			},
			dataType: 'json',
		});
	});

	 // SE TOMA LOS DATOS PARA EDITAR DATOS DE LA TABLA INVENTARIO
	 $('tbody').on('click', '.addBtn', function(){	 

	 	var idToAdd = $(this).data('item');

	 	$('#adicionar').removeClass('btn btn-primary');
	 	$('#adicionar').addClass('btn btn-success');
	 	$('#adicionar').val('Editar');
	 	$('#adicionar').unbind('click');
	 	$('#adicionar').attr('id','editar');

	 	$.ajax({

	 		url: '../controladores/inventarios/editarDatos.php',
	 		type: 'GET',
	 		data: {idToAdd: idToAdd},

	 		success:function(data){

	 			id=data['id'];	

	 			$('#buscar_codigos_inventario').val(data['codigo']);
	 			$('#buscar_descripcion_inventario').val(data['descripcion']);
	 			$('#buscar_marca_inventario').val(data['marca']);
	 			$('#buscar_modelo_inventario').val(data['modelo']);
	 			$('#buscar_anio_inventario').val(data['anio']);
	 			$('#buscar_marcaR_inventario').val(data['marca_r']);
	 			$('#procedencia').val(data['procedencia']);
	 			$('#costo').val(data['costo']);
	 			$('#pvp').val(data['pvp']);
	 			$('#cantidad').val(data['cantidad']);

	 		},

	 		dataType: 'json',
	 	});


	// SE EDITA DATOS DE LA TABLA INVENTARIO

	$('#editar').click(function(){

		var idAct=id;
		var codigo = $('#buscar_codigos_inventario').val();
		var descripcion = $('#buscar_descripcion_inventario').val();
		var marca = $('#buscar_marca_inventario').val();
		var modelo = $('#buscar_modelo_inventario').val();
		var anio = $('#buscar_anio_inventario').val();
		var marca_r = $('#buscar_marcaR_inventario').val();
		var procedencia = $('#procedencia').val();
		var costo = $('#costo').val();
		var pvp = $('#pvp').val();
		var cantidad = $('#cantidad').val();

	 	//var dataToSend= $(this).serialize();
	 	if(codigo=='' || descripcion==''|| marca==''||modelo=='' || anio=='' ||marca_r=='' ||procedencia==''||costo==''||pvp==''||cantidad==''){
	 		alert('Todos los campos son requeridos');
	 	}else{

	 		$.ajax({
	 			url: '../controladores/inventarios/editar.php',
	 			type: 'POST',
		 	//data: {idAct: idAct, dataToSend },
		 	data: {idAct: idAct, codigo: codigo, descripcion: descripcion, marca: marca, modelo: modelo, anio: anio, marca_r:marca_r, procedencia: procedencia, costo: costo, pvp: pvp, cantidad: cantidad},

		 	success:function(data){

		 		$('#cuerpo_inventario').html('');

		 		$.each(data, function(index, value){

		 			var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['procedencia']+'</td><td>'+value['costo']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td><td><button class="btn btn-warning addBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-pencil"></i></button></td></tr>';

		 			$('#cuerpo_inventario').append(fila);


		 		});


		 		$('#editar').removeClass('btn btn-success');
		 		$('#editar').addClass('btn btn-primary');
		 		$('#editar').val('Adicionar');
		 		$('#editar').attr('id', 'adicionar');



		 		$('#buscar_codigos_inventario').val('');
		 		$('#buscar_descripcion_inventario').val('');
		 		$('#buscar_marca_inventario').val('');
		 		$('#buscar_modelo_inventario').val('');
		 		$('#buscar_anio_inventario').val('');
		 		$('#buscar_marcaR_inventario').val('');
		 		$('#procedencia').val('');
		 		$('#costo').val('');
		 		$('#pvp').val('');
		 		$('#cantidad').val('');

		 	},
		 	dataType: 'json',
		 });
	 	}
	 });

});


	 //Boton_buscar_repuesto_inventario, realizamos las peticiones al servidor para presentar la tabla inventarios

	 
	 $('#buscar_repuesto_inventario').click(function(){

	 	var codigo = $('#buscar_codigos_inventario').val();
	 	var descripcion = $('#buscar_descripcion_inventario').val();
	 	var marca = $('#buscar_marca_inventario').val();
	 	var modelo = $('#buscar_modelo_inventario').val();
	 	var anio = $('#buscar_anio_inventario').val();
	 	var marca_r = $('#buscar_marcaR_inventario').val();


	 	$.ajax({

	 		url: '../controladores/inventarios/buscar_inventarios.php',
	 		type: 'POST',
	 		data: {codigo: codigo, descripcion: descripcion, marca: marca, modelo: modelo, anio: anio, marca_r: marca_r},

	 		success:function(data){


	 			$('#cuerpo_inventario').html('');

	 			$.each(data, function(index, value){
	 				var fila = '<tr id="'+value['id']+'"><td>'+ value['codigo'] +'</td><td>'+ value['descripcion'] +'</td><td>'+value['marca']+'</td><td>'+value['modelo']+'</td><td>'+value['anio']+'</td><td>'+value['marca_r']+'</td><td>'+value['procedencia']+'</td><td>'+value['costo']+'</td><td>'+value['pvp']+'</td><td>'+value['cantidad']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td><td><button class="btn btn-warning addBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-pencil"></i></button></td></tr>';
	 				$('#cuerpo_inventario').append(fila);

	 			});

	 		},

	 		dataType: 'json',

	 	});
	 });

	 //Boton volver a listar los items de la tabla

	 $('#volver_a_inventario').click(function(){
	 	
	 	location.href="../extensiones/administradores.php";
	 });




	 //se lista los items de LA TABLA CLIENTES


	 $.ajax({
	 	url: '../controladores/clientes/clientes.php',
	 	type: 'get',

	 	success:function(data){
	 		
	 		$.each(data, function(index, value){
	 			var fila = '<tr id="'+value['id']+'"><td>'+ value['nombre'] +'</td><td>'+ value['apellido'] +'</td><td>'+value['cedula']+'</td><td>'+value['ciudad']+'</td><td>'+value['sector']+'</td><td>'+value['direccion']+'</td><td>'+value['correo']+'</td><td>'+value['telefono']+'</td><td>'+value['usuario']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';
	 			$('#cuerpo_tclientes').append(fila);
	 		});
	 	},
	 	dataType: 'json',
	 });

	//Boton_buscar_repuesto_inventario, realizamos las peticiones al servidor para presentar la tabla inventarios


	$('#buscar_cliente').click(function(){

		var nombre = $('#buscar_nombre_cliente').val();
		var apellido = $('#buscar_apellido_cliente').val();
		var cedula = $('#buscar_cedula_cliente').val();
		var ciudad = $('#buscar_ciudad_cliente').val();
		var sector = $('#buscar_sector_cliente').val();
		var direccion = $('#buscar_dir_cliente').val();
		var correo = $('#buscar_correo_cliente').val();
		var telefono = $('#buscar_telefono_cliente').val();
		var usuario = $('#buscar_user_cliente').val();


		$.ajax({

			url: '../controladores/clientes/buscar_cliente.php',
			type: 'POST',
			data: {nombre: nombre, apellido: apellido, cedula: cedula, ciudad: ciudad, sector: sector, direccion: direccion, correo: correo, telefono: telefono, usuario: usuario},

			success:function(data){


				$('#cuerpo_tclientes').html('');

				$.each(data, function(index, value){
					var fila = '<tr id="'+value['id']+'"><td>'+ value['nombre'] +'</td><td>'+ value['apellido'] +'</td><td>'+value['cedula']+'</td><td>'+value['ciudad']+'</td><td>'+value['sector']+'</td><td>'+value['direccion']+'</td><td>'+value['correo']+'</td><td>'+value['telefono']+'</td><td>'+value['usuario']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';
					$('#cuerpo_tclientes').append(fila);

				});

			},

			dataType: 'json',

		});
	});

	 //Boton volver a listar los items de la tabla

	 $('#volver_a_tclientes').click(function(){
	 	$('#cuerpo_tclientes').html('');
	 	$('#buscar_nombre_cliente').val('');
	 	$('#buscar_apellido_cliente').val('');
	 	$('#buscar_cedula_cliente').val('');
	 	$('#buscar_ciudad_cliente').val('');
	 	$('#buscar_sector_cliente').val('');
	 	$('#buscar_dir_cliente').val('');
	 	$('#buscar_correo_cliente').val('');
	 	$('#buscar_telefono_cliente').val('');
	 	$('#buscar_user_cliente').val('');

	 	$.ajax({
	 		url: '../controladores/clientes/clientes.php',
	 		type: 'get',

	 		success:function(data){

	 			$.each(data, function(index, value){
	 				var fila = '<tr id="'+value['id']+'"><td>'+ value['nombre'] +'</td><td>'+ value['apellido'] +'</td><td>'+value['cedula']+'</td><td>'+value['ciudad']+'</td><td>'+value['sector']+'</td><td>'+value['direccion']+'</td><td>'+value['correo']+'</td><td>'+value['telefono']+'</td><td>'+value['usuario']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td></tr>';
	 				$('#cuerpo_tclientes').append(fila);
	 			});
	 		},
	 		dataType: 'json',
	 	});
	 });


	  //se lista los items de LA TABLA ADMINISTRADORES


	  $.ajax({
	  	url: '../controladores/admin/admin.php',
	  	type: 'get',

	  	success:function(data){

	  		$.each(data, function(index, value){
	  			var fila = '<tr id="'+value['id']+'"><td>'+ value['nombre'] +'</td><td>'+ value['apellido'] +'</td><td>'+value['cedula']+'</td><td>'+value['contrasena']+'</td><td><button class="btn btn-danger eliminarBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-remove"></i></button></td><td><button class="btn btn-success addBtn" data-item = "'+value['id']+'"><i class="glyphicon glyphicon-plus"></i></button></td></tr>';
	  			$('#cuerpo_admin').append(fila);
	  		});
	  	},
	  	dataType: 'json',
	  });




	});


