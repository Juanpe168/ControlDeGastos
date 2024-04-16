<?php $error=""; if(isset($_GET["error"])){ $error="Usuario o contraseña incorrecto"; } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<link rel="stylesheet" type="text/css" href="adminTemplate/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="adminTemplate/shCore.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
	
		<center>
			<div>
				<img style="width:10%; padding-top: 5%;" src="images/icono.png">
			</div>
		</center>
		
		<section id="registration" class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-4"></div>
					<div class="col-md-4 cuadro_login">
					<form class="center" role="form" method="post" action="login.php">
						<fieldset class="registration-form">
							<div class="form-group">
								<input type="text" id="username" name="user" placeholder="Usuario" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" id="password_confirm" name="pass" placeholder="Contraseña" class="form-control">
							</div>
							<div class="form-group">
								<center><button class="botoncito">Login</button></center>
							</div>
							<div>
								<center><err><?php echo $error; ?></err></center>
							</div>
						</fieldset>
					</form>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		</section>
	
</body>

	<script type="text/javascript" language="javascript" src="adminTemplate/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" language="javascript" src="adminTemplate/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="adminTemplate/shCore.js"></script>	

</html>