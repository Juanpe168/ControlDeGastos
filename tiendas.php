<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Selección de tienda</title>
</head>

<body>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center><h1>Sel·lecciona la botiga</h1></center><br><br>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<a href='operaciones.php?local=calafell'><img src="images/logo_calafell.png" style="width: 100%"></a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<a href='operaciones.php?local=vendrell'><img src="images/icono.png" style="width: 100%"></a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
		</div>
	</div>

</body>

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

	<!-- Links Bootstrap -->

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/prettify.css" rel="stylesheet">
	
</html>