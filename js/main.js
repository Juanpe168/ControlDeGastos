
function recogerUsuario() {
	var userGuardado = localStorage.getItem('usuario');
	document.getElementById('buscarUsuario').value = userGuardado;
}

function obtenerTags_c(){ //Obtenemos el campo introducido en el campo de producto y buscamos en la BBDD si ya existe
	$("#idConcepto").val("");
	lastCall++;
	var tag_c = document.getElementById("tag_c").value;
	var parametros = {'tag_c':tag_c};
	var call = lastCall;

	setTimeout(function(){
		if(call == lastCall && tag_c.length>1){
			
			$("#resultado1Ul").html("");
			$("#resultado1").show();
			$("#resultado1Ul").show();
			
			$.ajax({
				data:  parametros,
				url:   'datos_concep.php',
				dataType: 'json',
				type:  'get',
				success:  function (response) {

					if(call == lastCall){
						tag_c = response;

						for(i=0;i<tag_c.DatosArticulos.length;i++){
							$("#resultado1Ul").append("<li id='liConcepto"+tag_c.DatosArticulos[i].id+"' onclick='guardarIDConcepto("+tag_c.DatosArticulos[i].id+")'>"+tag_c.DatosArticulos[i].concepto+"</li>");
						}
					}
					document.getElementById('resultado1').style.marginTop='-10px';
				$("#resultado1").show();
				$("#resultado1UI").show();
				}
			});
		} else {
			$("#resultado1Ul").html("");
			$("#resultado1").hide();
		}
	}, 300);
				
}

function obtenerTags_cat(){ //Obtenemos el campo introducido en el campo de categoria y buscamos en la BBDD si ya existe
	$("#idCategoria").val("");
	lastCall++;
	var tag_cat = document.getElementById("tag_cat").value;
	var parametros = {'tag_cat':tag_cat};
	var call = lastCall;
	
	setTimeout(function(){
		if(call == lastCall && tag_cat.length>1){
		
		$("#resultado2Ul").html("");
		document.getElementById('resultado2').style.marginTop='-10px';
		$("#resultado2").show();
		$("#resultado2Ul").show();
		$("#resultado2Ul").append("<li class='anadirElemento' onclick='insertarCategoria()'>Añadir nueva Categoria</li>");
		
			$.ajax({
				data:  parametros,
				url:   'datos_cat.php',
				dataType: 'json',
				type:  'get',
				success:  function (response) {
					
					tag_cat = response;
					
					for(i=0;i<tag_cat.DatosCategoria.length;i++){
						$("#resultado2Ul").prepend("<li <li id='liCategoria"+tag_cat.DatosCategoria[i].id+"' onclick='guardarIDCategoria("+tag_cat.DatosCategoria[i].id+")'>"+tag_cat.DatosCategoria[i].nombre+"</li>");
					}
					
				}
			});
		} else {
			$("#resultado2Ul").html("");
			$("#resultado2").hide();
		}
	}, 300);
				
}

function obtenerTags_t(){ //Obtenemos el campo introducido en el campo de tienda/cliente y buscamos en la BBDD si ya existe
	lastCall++; // aumentamos los caracteres que introducimos a la llamada a la bbdd
	var tag_t = document.getElementById("tag_t").value;
	var parametros = {'tag_t':tag_t};
	var call = lastCall; // igualamos los caracteres que tenemos introducidos con los ultimos
	$("#idTienda").val("");
	setTimeout(function(){
		
		if(call == lastCall && tag_t.length > 1){

		$("#resultado3Ul").html("");
		
			if ($(".estadoCompraVenta").hasClass("off")) {
				
				$("#resultado3Ul").append("<li class='anadirElemento' onclick='llamarVentana("+'"Tienda","tag_t"'+")'>Añadir nueva tienda</li>");
				document.getElementById('resultado3').style.marginTop='-10px';
				$("#resultado3").show();
				$("#resultado3Ul").show();
				
				$.ajax({
					data:  parametros,
					url:   'datos_tienda.php',
					dataType: 'json',
					type:  'get',
					
					success:  function (response) {
						resultadoTienda = response;
						
						for(i=0;i<resultadoTienda.DatosTienda.length;i++){
							$("#resultado3Ul").prepend("<li id='liTienda"+resultadoTienda.DatosTienda[i].id+"' onclick='guardarIDTienda("+resultadoTienda.DatosTienda[i].id+")'>"+resultadoTienda.DatosTienda[i].nombre+"</li>");	
						}
					}
				});
				
			} else {
				
				$("#resultado3Ul").append("<li class='anadirElemento' onclick='llamarVentana("+'"Tienda","tag_t"'+")'>Añadir nuevo cliente</li>");
				document.getElementById('resultado3').style.marginTop='-10px';
				$("#resultado3").show();
				$("#resultado3Ul").show();
				$.ajax({
					data:  parametros,
					url:   'datos_cliente.php',
					dataType: 'json',
					type:  'get',
					
					success:  function (response) {
						resultadoCliente = response;
						if( resultadoCliente.DatosCliente != null) {
							for(i=0;i<resultadoCliente.DatosCliente.length;i++){				
								$("#resultado3Ul").prepend("<li id='liTienda"+resultadoCliente.DatosCliente[i].id+"' onclick='guardarIDTienda("+resultadoCliente.DatosCliente[i].id+")'>"+resultadoCliente.DatosCliente[i].nombre+"</li>");						
							}
						}
					}
				});
			}	
		} else {
			$("#resultado3Ul").html("");
			$("#resultado3").hide();
		}
	}, 300);			
}


function llamarVentana() {

	var x = screen.availWidth;
	var y = screen.availHeight;
	
	var modal = document.getElementById("anadirTienda");
		var modalAncho = x / 2;
		var modalAlto = y / 2;
		
		modal.style.width=modalAncho+'px';
		modal.style.height=modalAlto+'px';

    modal.style.display = 'block';
}


$('input:checkbox').click(function(){
	if ($('#chk1').prop("checked")) {
		$('#selector').show();
	} else {
		$('#selector').hide();
	}
});

var tablaDataTabla;
$(document).ready(function () {
/*table.columns( '.escondida' ).visible( false );*/
var table = $('#tablaRegistros').DataTable();
table.columns( '.escondida' ).visible( false );

tablaDataTabla = $('#tablaRegistros').DataTable({

"columns" : [
		{ "width": "60px"},
		{ "width": "60px"},
		{ "width": "60px"},
		{ "width": "60px"},
		{ "width": "60px"},
		{ "width": "60px"},
		{ "width": "60px"},
		{ "width": "60px"}
		]
	});
					
});

var lastCall = 0;

function obtenerCliente(){ //Obtenemos el campo introducido en el campo de categoria y buscamos en la BBDD si ya existe
	lastCall++;
	var nomCliente = document.getElementById("nomCliente").value;
	var parametros = {'nomCliente':nomCliente};
	var call = lastCall;
	
	setTimeout(function(){
		if(call == lastCall && nomCliente.length>1){
			$("#muestraClie").html("");
			$("#resultadoClie").css('margin-top','-10px');
			$("#resultadoClie").show();
			$("#muestraClie").show();
			
			$.ajax({
				data:  parametros,
				url:   'nombrecliente.php',
				dataType: 'json',
				type:  'get',
				
				success:  function (response) { 
					nomCliente = response;

					for(i=0;i<nomCliente.nombreCliente.length;i++){				
						$("#muestraClie").prepend("<li>"+nomCliente.nombreCliente[i].nombre+"</li>");
						
					}
					$("#resultadoClie").show();
					$("#muestraClie").show();
					
				}
			});
		} else {
			$("#muestraClie").html("");
			$("#resultadoClie").hide();
		}
	}, 300);				
}

function obtenerProductos(){ //Obtenemos el campo introducido en el campo de categoria y buscamos en la BBDD si ya existe
	lastCall++;
	var nomProducto = document.getElementById("nomProducto").value;
	var parametros = {'nomProducto':nomProducto};
	var call = lastCall;
	
	setTimeout(function(){
		if(call == lastCall && nomProducto.length>1){
			$("#muestraProd").html("");
			$("#resultadoProd").css('margin-top','-10px');
			$("#resultadoProd").show();
			$("#muestraProd").show();
			
			$.ajax({
				data:  parametros,
				url:   'productosquery.php',
				dataType: 'json',
				type:  'get',
				
				success:  function (response) { 
					nomProducto = response;

					for(i=0;i<nomProducto.DatosProducto.length;i++){				
						$("#muestraProd").prepend("<li>"+nomProducto.DatosProducto[i].concepto+"</li>");
						
					}
					$("#resultadoProd").show();
					$("#muestraProd").show();
				}
			});
		} else {
			$("#muestraProd").html("");
			$("#resultadoProd").hide();
		}
	}, 300);				
}

function obtenerProductos(){ //Obtenemos el campo introducido en el campo de categoria y buscamos en la BBDD si ya existe
	lastCall++;
	var nomProducto = document.getElementById("nomProducto").value;
	var parametros = {'nomProducto':nomProducto};
	var call = lastCall;
	
	setTimeout(function(){
		if(call == lastCall && nomProducto.length>1){
			$("#muestraProd").html("");
			$("#resultadoProd").css('margin-top','-10px');
			$("#resultadoProd").show();
			$("#muestraProd").show();
			
			$.ajax({
				data:  parametros,
				url:   'productosquery.php',
				dataType: 'json',
				type:  'get',
				
				success:  function (response) { 
					nomProducto = response;

					for(i=0;i<nomProducto.DatosProducto.length;i++){				
						$("#muestraProd").prepend("<li>"+nomProducto.DatosProducto[i].concepto+"</li>");
						
					}
					$("#resultadoProd").show();
					$("#muestraProd").show();
				}
			});
		} else {
			$("#muestraProd").html("");
			$("#resultadoProd").hide();
		}
	}, 300);				
}

function obtenerImporte(){ //Obtenemos el campo introducido en el campo de categoria y buscamos en la BBDD si ya existe
	lastCall++;
	var nomImporte = document.getElementById("nomImporte").value;
	var parametros = {'nomImporte':nomImporte};
	var call = lastCall;
	
	setTimeout(function(){
		if(call == lastCall && nomImporte.length>1){
			$("#muestraImporte").html("");
			$("#resultadoImporte").css('margin-top','-10px');
			$("#resultadoImporte").show();
			$("#muestraImporte").show();
			
			$.ajax({
				data:  parametros,
				url:   'importequery.php',
				dataType: 'json',
				type:  'get',
				
				success:  function (response) { 
					nomImporte = response;

					for(i=0;i<nomImporte.DatosImporte.length;i++){				
						$("#muestraImporte").prepend("<li>"+nomImporte.DatosImporte[i].concepto+"</li>");
						
					}
					$("#resultadoImporte").show();
					$("#muestraImporte").show();
				}
			});
		} else {
			$("#muestraProd").html("");
			$("#resultadoProd").hide();
		}
	}, 300);				
}

function obtenerTienda(){ //Obtenemos el campo introducido en el campo de categoria y buscamos en la BBDD si ya existe
	lastCall++;
	var nomTienda = document.getElementById("nomTienda").value;
	var parametros = {'nomTienda':nomTienda};
	var call = lastCall;
	
	setTimeout(function(){
		if(call == lastCall && nomTienda.length>1){
			$("#muestraTienda").html("");
			$("#resultadoTienda").css('margin-top','-10px');
			$("#resultadoTienda").show();
			$("#muestraTienda").show();
			
			$.ajax({
				data:  parametros,
				url:   'tiendaquery.php',
				dataType: 'json',
				type:  'get',
				
				success:  function (response) { 
					nomTienda = response;

					for(i=0;i<nomTienda.DatosTienda.length;i++){				
						$("#muestraTienda").prepend("<li>"+nomTienda.DatosTienda[i].nombre+"</li>");	
					}
					$("#resultadoTienda").show();
					$("#muestraTienda").show();
				}
			});
		} else {
			$("#muestraTienda").html("");
			$("#resultadoTienda").hide();
		}
	}, 300);				
}

function visualizarCompras(){
	categoria = $("#categoria").val();
	nomCliente = $("#nomCliente").val();
	nomProducto = $("#nomProducto").val();
	nomImporte = $("#nomImporte").val();
	nomTienda = $("#nomTienda").val();
	nomUser = $("#nomUser").val();
	
			var parametros = {"categoria":categoria,"nomCliente":nomCliente,"nomProducto":nomProducto,"nomImporte":nomImporte,"nomTienda":nomTienda,"nomUser":nomUser};
			
			var resultadoQuery = "";
			tablaDataTabla.clear().draw();
			$.ajax({
				data:  parametros,
				url:   'querydatatablecompras.php',
				dataType: 'json',
				type:  'POST',
				success:  function (response) {
					
					QueryCompra = response;
					for(i=0;i<QueryCompra.DatosCompra.length;i++){
						if(QueryCompra.DatosCompra[i].propiedad == 1){
							var tienda="El Vendrell";
						}else if(QueryCompra.DatosCompra[i].propiedad == 2){
							var tienda="Calafell";
						}
							
						 tablaDataTabla.row.add([QueryCompra.DatosCompra[i].nombre, QueryCompra.DatosCompra[i].Clientes, QueryCompra.DatosCompra[i].concepto,QueryCompra.DatosCompra[i].IDProducto,QueryCompra.DatosCompra[i].fecha,QueryCompra.DatosCompra[i].importe,tienda,QueryCompra.DatosCompra[i].user]);
						
						$("#muestraQuery").append(resultadoQuery);

					}
					tablaDataTabla.draw();
				}
			});				
}

function visualizarVentas(){
	
		categoria = $("#categoria").val();
		nomCliente = $("#nomCliente").val();
		nomProducto = $("#nomProducto").val();
		nomImporte = $("#nomImporte").val();
		nomTienda = $("#nomTienda").val();
		nomUser = $("#nomUser").val();
		
			var parametros = {"categoria":categoria,"nomCliente":nomCliente,"nomProducto":nomProducto,"nomImporte":nomImporte,"nomTienda":nomTienda,"nomUser":nomUser};
			var resultadoQuery = "";
			tablaDataTabla.clear().draw();
			$.ajax({
				data:  '',
				url:   'querydatatableventas.php',
				dataType: 'json',
				type:  'get',
				success:  function (response) { 
					QueryVentas = response;
					for(i=0;i<QueryVentas.DatosVentas.length;i++){
						if(QueryVentas.DatosVentas[i].propiedad == 1){
							var tienda="El Vendrell";
						}else if(QueryVentas.DatosVentas[i].propiedad == 2){
							var tienda="Calafell";
						}
							
						 tablaDataTabla.row.add([QueryVentas.DatosVentas[i].nombre, QueryVentas.DatosVentas[i].Tienda, QueryVentas.DatosVentas[i].concepto,QueryVentas.DatosVentas[i].IDProducto,QueryVentas.DatosVentas[i].fecha,QueryVentas.DatosVentas[i].importe,tienda,QueryVentas.DatosVentas[i].user]);
						
						$("#muestraQuery").append(resultadoQuery);

					}
					tablaDataTabla.draw();
				}
			});				
}
