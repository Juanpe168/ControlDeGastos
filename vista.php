<html>
	<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
		<!-- Latest compiled and minified CSS -->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/estilovista.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
 

	</head>
	
	<body>
	
	<!-- Latest compiled and minified CSS -->
	<header>	
		<div class=" container totheleft2 header" >
			<div class = "row ">				
				<div class = "col-lg-2 col-md-2 totheleft2">
					<a href="">Tiendas</a>
				</div>
				
					<div class = "col-lg-3 col-lg-3 totheleft2">

					</div>
				
				<div class = "col-lg-4 col-lg-4 totheleft2">
					<a href="vista.php">Compras</a>
					
				</div>
				
				<div class = "col-lg-3 col-lg-3 totheleft2">
					<a href="vistaventa.php">Ventas</a>
				</div>
			</div>
		</div><!-- Cierre del container nav -->
	</header>	
				<div class="container totheleft">
					<div class="row primera totheleft">
						<div class="col-lg-3 col-md-3" >
							<div class="row segunda">
								<div class="col-lg-12 col-md-12" >
								
										<div class="col-md-12 col-lg-12 totheleft" >
											<div class="form-group">
												
												<?php  include "categories.php";?>
												
												<label>Categoria</label>
													<select id="categoria" class="form-control form-control-sm" style="width:100%;" onchange="visualizarCompras();" placeholder="Categoria de articulo" >
													<option value="0">Seleccionar opcion</option>
													<?php
													for($i=0;$i<count($datosCategoria['datosCategoria']);$i++){
														echo "<option value='".$datosCategoria['datosCategoria'][$i]['ID']."'>".$datosCategoria['datosCategoria'][$i]['nombre']."</option>";
													}
													?>		
													</select>
											</div>
										</div>
										<div class="col-md-12 col-lg-12" class="form-group" >								
												<label>Nombre de Cliente</label>				
												 <div class="form-group" style="width:100%;">
													<input type="text" id="nomCliente" class="form-control" onkeyup="visualizarCompras();" placeholder="Nombre de Cliente">
													<div id="resultadoClie">														
														<ul id="muestraClie">
														</ul>
													</div>	
												</div>	
										</div>
										
										<div class="col-md-12 col-lg-12" class="form-group" >
										
												<label>Productos</label>
												<div class="form-group" style="width:100%;">
													<input type="text" id="nomProducto" class="form-control" onkeyup="visualizarCompras();" placeholder="Productos">
													<div id="resultadoProd">
														<ul id="muestraProd">
															
														</ul>
													</div>
												</div>
										</div>
										
										<div class="col-md-12 col-lg-12" class="form-group" >
												<label>Fecha</label>
												<div class="form-group" style="width:100%;">
													<input size="16" type="text" class="form-control" id="datetime" readonly>
														

												</div>
										</div>
										
										<div class="col-md-12 col-lg-12" class="form-group" >
												<label>Importe</label>
												<div class="form-group" style="width:100%;">
													<input type="text" class="form-control" placeholder="Importe" id="nomImporte" onkeyup="visualizarCompras();">
													<div id="resultadoImporte"> 
														<ul id="muestraImporte">
														</ul>
													
													</div>
													
												</div>
										</div>
										
										<div class="col-md-12 col-lg-12" class="form-group" >
												<label>Tienda</label>
												<div class="form-group" style="width:100%;">
													<input type="text"  class="form-control" placeholder="Tienda" onkeyup="visualizarCompras();" id="nomTienda">
													<div id="resultadoTienda">
													<ul id="muestraTienda"></ul>
													
													</div>
													
												</div>
										</div>
										
										<div class="col-md-12 col-lg-12" class="form-group" >
										
											<?php  include "usuarios.php";?>
										
												<label>Usuario</label>						
												<select class="form-control form-control-sm" style="width:100%;" placeholder="Categoria de articulo" id="nomUser" onchange="visualizarCompras();" >
													<option value="0">Seleccionar opcion</option>
													<?php
													for($i=0;$i<count($datosUser['datosUser']);$i++){
														echo "<option value='".$datosUser['datosUser'][$i]['ID']."'>".$datosUser['datosUser'][$i]['user']."</option>";
													}
													?>		
												</select>
												<br>
										</div>
										
										<div class="col-md-12 col-lg-12" class="form-group" >
										
											<?php  include "local.php";?>
										
												<label>Local</label>						
												<select class="form-control form-control-sm" style="width:100%;" placeholder="Categoria de articulo" id="nomLocal" onchange="visualizarCompras();" >
													<option value="0">Seleccionar opcion</option>
													<?php
													for($i=0;$i<count($datosTienda['datosTienda']);$i++){
														echo "<option value='".$datosTienda['datosTienda'][$i]['ID']."'>".$datosTienda['datosTienda'][$i]['propiedad']."</option>";
													}
													?>		
												</select>
												<br>
										</div>
										
										
										

										<div class="col-md-12 col-lg-12" class="form-group" >
										<button type="button" class="btn btn-success" style="width:100%;" onclick="visualizarCompras();">Visualizar Datos</button>
										
										</div>

								</div>
							</div><!-- Cierre del row Segunda -->
						</div> <!-- Cierre del Col 3  -->
							
							<div class="col-lg-9 col-md-9">
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<!--Table-->
										<table id="tablaRegistros" style="width:100%">

										  <!--Table head-->
										  <thead>
										    <tr class ="tablafuente">
										      <th id="categoria">Categoria</th>
										      <th>Tienda</th>
										      <th>Productos</th>
										      <th class ="escondida">ID</th>
											  <th>Fecha</th>
										      <th>Importe</th>
										      <th>Local</th>
										      <th>Usuario</th>
										    </tr>
										  </thead>
										  <!--Table head-->

										  <!--Table body-->
										  <tbody id="muestraQuery" style="width:100%">
										   
					
										  </tbody>
										  <!--Table body-->


										</table>
										<!--Table-->

									</div>
								</div> 
							</div><!-- Cierre col-lg-9 col-md-9 -->
					</div>	<!-- Cierre del row Primera -->
				</div>	<!-- Cierre del container -->	
						
						
	
					<!-- clase alinear a la derecha totheleftcoño -->
				
			

	
	</body>
	<script src="adminTemplate/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- MDBootstrap Datatables  -->
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/fh-3.1.4/r-2.2.2/datatables.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
</html>


<!--
for($i=0;$i<count($datosCliente['datosCliente']);$i++){
	echo "<option value='".$datosCliente['datosCliente'][$i]['ID']."'>".$datosCliente['datosCliente'][$i]['nombre']."</option>";
}-->
