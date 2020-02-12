<html>
	<head>
		<title>Prueba</title>
		<script src="../js/jquery-3.4.0.min.js" ></script>
		<script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/<?php echo $js; ?>"></script>
	</head>
	<body>
	
		<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="..\imagenes\levi.jpg" width="300" height="140" alt="">
				
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Administrador
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href=".\Sucursal.php">Sucursal</a>    
					<a class="dropdown-item" href=".\Usuario.php">Usuario</a>
                                        <a class="dropdown-item" href=".\Boleta.php">Boleta</a>
                                        <a class="dropdown-item" href=".\TipoProducto.php">Tipo Producto</a>
					<a class="dropdown-item" href=".\Marca.php">Marca</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href=".\Proveedor.php">Proveedor</a>
					<div class="dropdown-divider"></div>
                                        <div class="dropdown-divider"></div>
					<a class="dropdown-item" href=".\Detalle.php">Detalle</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href=".\Producto.php">Producto</a>
					</div>
					</li>
				</ul>
			</div>
		</nav>
		<?php
			if(isset($error))
				echo "<div class='alert alert-danger' role='alert'>$error</div>";
			if(isset($exito))
				echo "<div class='alert alert-primary' role='alert'>$exito</div>";
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">