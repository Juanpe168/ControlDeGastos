<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
	<header>
			<div class="row" style="width: 90%">
				<div class="col-md-3 col-lg-3 text-right">
					<div class="form-group inner-addon left-addon">
						<i class="fas fa-user"></i>
						<center><input id='buscarUsuario' type="text" name="user" class="form-control"></center>
					</div>
				</div>
				<div class="col-md-1 col-lg-1"></div>
				<div class="col-md-3 col-lg-3">
					<center>logo</center>
				</div>
				<div class="col-md-1 col-lg-1"></div>
				<div class="col-md-3 col-lg-3n">
					<div class="form-group inner-addon left-addon">
						<i class="fas fa-calendar-alt"></i>
						<center><input id="fechaOperacion" type="date" name="data" class="form-control"></center>
					</div>
				</div>
			</div>
	</header>
	
	<article>
		<div class="container">
    		<div class="row" style="width: 90%">
				<div class="col-md-12 col-lg-12"><div class="form-group">
					<form>
						<div class="col-md-4 col-lg-4">
							<div class="row">
								<div class="col-md-12 col-lg-12">				
									<div class="form-group inner-addon left-addon">
										<i class="fas fa-user-secret"></i>
										<input type="text" name="tienda" class="form-control" onkeyup ="obtenerTags_t()" id="tag_t" placeholder="Introduce el nombre de la tienda">	
										<div id="resultado3"></div>
									</div>
								</div>
								
								<div class="col-md-12 col-lg-12">		
									<div class="form-group inner-addon left-addon">
										<i class="fas fa-lightbulb"></i>
										<input type="text" name="concepto" class="form-control" onkeyup ="obtenerTags_c()" id="tag_c" placeholder="Artículo">
										<div id="resultado1"></div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">		
									<div class="form-group inner-addon left-addon">
										<i class="fas fa-money-bill-alt"></i>
										<input type="text" name="importe" class="form-control" placeholder="Importe €">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
									<div class="form-group inner-addon left-addon">
										<i class="fas fa-archive"></i>
										<input type="text" name="cantidad" class="form-control" placeholder="Cantidad">
									</div>							
								</div>							
								<div class="col-md-12 col-lg-12">
									<div class="checkbox">
											<label style="font-size: 1em">
												<input type="checkbox" value="1" id="chk1" checked>
												<span class="cr"><i class="cr-icon fa fa-check"></i></span>
												<et1>Tarjeta</et1>
											</label>
											
											<label style="font-size: 1em">
												<input type="checkbox" value="2" id="chk2">
												<span class="cr"><i class="cr-icon fa fa-check"></i></span>
												<et1>Efectivo</et1>
											</label>
											
											<label style="font-size: 1em">
												<input type="checkbox" value="3" id="chk3">
												<span class="cr"><i class="cr-icon fa fa-check"></i></span>
												<et1>Online</et1>
											</label>
											
											<select class="form-control form-control-sm" id="selector">
												<option>Tarjeta 1</option>
												<option>Tarjeta 2</option>
												<option>Tarjeta 3</option>
											</select>
									</div>
								</div>
								<div class="col-md-12 col-lg-12">	
									<div class="form-group inner-addon left-addon">
										<i class="fas fa-book-dead"></i>
										<input type="text" name="categoria" onkeyup ="obtenerTags_cat()" id="tag_cat" class="form-control" style="width='30px'" placeholder="Categoria: Electricidad, Artículos de oficina, ...">
										<div id="resultado2"></div>
									</div>
								</div>
								<div class="col-md-12 col-lg-12">
									<div class="form-group inner-addon left-addon">
										<i class="fas fa-file-alt"></i>
										<input type="text" name="factura" class="form-control" style="width='30px'" placeholder="Número Factura"><br><br>
									</div>
								</div>
							</div>
							<center>
								<button type="button" class="botoncito">Añadir</button>
								<button type="button" class="botoncito">Eliminar</button>
							</center>
						</div>
				<div class="col-md-5 col-lg-5"></div>				
				</form>
			</div>
		</div>
	</div>
	
	<!-- Ventana Emergente Tienda -->
					
	<center><div id="anadirTienda" style="display:block;">
		<div class="row" style="width: 90%">
        	<div class="col-md-12">
				<div class="form-group">
				<form>
					<center><h1>Añadir una nueva tienda</h1></center>
					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-shopping-cart"></i>
								<input id="nombretienda" class="form-control" type="text" style="width:100%;" placeholder="Nombre">
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-address-card"></i>
								<input id="niftienda" class="form-control" type="text" style="width:100%;" placeholder="NIF">
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-12">
						<div class="col-md-8 col-lg-8">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-compass"></i>
								<input id="directienda" class="form-control" type="text" style="width:100%;" placeholder="Dirección">
							</div>
						</div>
						<div class="col-md-4 col-lg-4">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-atlas"></i>
								<input id="cptienda" class="form-control" type="text" style="width:100%;" placeholder="C. Postal">
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-directions"></i>
								<input id="pobtienda" class="form-control" type="text" style="width:100%;" placeholder="Población">
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group">
								<textarea id="desctienda" class="form-control" type="text" style="width:100%; height: 60px; resize: none;" placeholder="Breve Descripción"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-lg-12">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-skull"></i>
								<input id="zonatienda" class="form-control" type="text" placeholder="Zona (1 Vendrell / 2 Calafell)" style="width:100%;"><br>
							</div>
						</div>
						<center><button type="sumbit" class="botoncito" style="font-size:1.2em">Aceptar</button>
						<button type="sumbit" class="botoncito" style="font-size:1.2em">Cancelar</button></center>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div></center>
					
	<!-- Ventana Emergente Tienda fin -->
	
	<!-- Ventana Emergente Cliente -->
					
	<center><div id="anadirTienda" style="display:none;">
		<div class="row" style="width: 90%">
        	<div class="col-md-12">
				<div class="form-group">
				<form>
					<center><h1>Añadir un nuevo Cliente</h1></center>
					<div class="col-md-12 col-lg-12">
						<div class="col-md-6 col-lg-6">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-user"></i>
								<input id="nombreCliente" class="form-control" type="text" style="width:100%;" placeholder="Nombre Cliente">
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-phone"></i>
								<input id="telfCliente" class="form-control" type="text" style="width:100%;" placeholder="Telefono Cliente">
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-12">
						<div class="col-md-12 col-lg-12">
							<div class="form-group inner-addon left-addon">
								<i class="fas fa-at"></i>
								<input id="mailCliente" class="form-control" type="text" placeholder="eMail Cliente" style="width:100%;"><br>
							</div>
						</div>
						<center><button type="sumbit" class="botoncito" style="font-size:1.2em">Aceptar</button>
						<button type="sumbit" class="botoncito" style="font-size:1.2em">Cancelar</button></center>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div></center>
					
	<!-- Ventana Emergente Cliente fin -->
	
	
	</article>
	
</body>

	<footer>
		<div class="row" style="width: 90%">
			<div class="col-md-12 col-lg-12">
					<div class="col-md-3 col-lg-3 text-center">
						<button class="btn_drc">Atrás</button>
					</div>
					<div class="col-md-1 col-lg-1"></div>
					<div class="col-md-3 col-lg-3"></div>
					<div class="col-md-1 col-lg-1"></div>
					<div class="col-md-3 col-lg-3 text-right">
						<button class="btn_drc">Siguiente</button>
					</div>
				</div>
			</div>

	</footer>
		
	<script>
		var usuario="";
		if(localStorage.getItem('usuario')){
			usuario = localStorage.getItem('usuario');
		}else{
			if('<?php if(isset($_SESSION["usuario"])) echo $_SESSION["usuario"];?>'){
				localStorage.setItem('usuario', '<?php if(isset($_SESSION["usuario"])) echo $_SESSION["usuario"]?>');
				usuario = localStorage.getItem('usuario');
			}else{
				location.href="index.php";
			}
		}
	</script>
		
		
	<script src="adminTemplate/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- FontAwesome Icons -->
	

</html>