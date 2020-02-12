<?php
	/* invoca el archivo con la clase*/
	include_once('../entidades/Boleta.php');
	/* creación  de instancia */
	$boleta = new Boleta();
	if(isset($_POST['btnGrabar']))
	{
		/* traspaso de información enviada por el usuario a la instancia */
		$boleta->setId($_POST['txtId']);
		$boleta->setIdUsuario($_POST['cmbUsuario']);
		$boleta->setIdSucursal($_POST['cmbSucursal']);
		$boleta->setFechaBoleta($_POST['txtFechaBoleta']);
                $boleta->setTotal($_POST['txtTotal']);
		/* graba la información traspasada en el punto anterior*/
		$boleta->grabar();
		$exito = "Datos guardados";		
	}
	else if(isset($_POST['btnListar']))
	{
		$boleta->setFechaBoleta($_POST['txtFechaBoleta']);
		$boleta->setIdUsuario($_POST['cmbUsuario']);
		$boleta->setTotal($_POST['txtTotal']);
		$tabla = $boleta->listar();
	}

	$js = 'Boleta.js';
	include_once('../HTML/Head.php');
?>
	<div class="row">
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-10">
			<h2>Boleta</h2>
		</div>
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Usuario
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $boleta->cmbUsuario();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Sucursal
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $boleta->cmbSucursal();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
                <div class="col-12 col-sm-2">
			Fecha de Boleta
		</div>
		<div class="col-12 col-sm-4">
			<input type=date name="txtFechaBoleta" 
								class="txtFechaBoleta form-control">
		</div>	
                <div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Total
		</div>
		<div class="col-12 col-sm-4">
			<input type=text name="txtTotal" 
								class="txtTotal form-control"
								size=20
								maxlength=100>
		</div>		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-6">
			<input type=submit name="btnListar" 
								class="btnListar  btn btn-outline-success float-right "
								value="Listar">
			<input type=submit name="btnGrabar" 
								class="btnGrabar  btn btn-outline-danger float-right"
								value="Guardar">
			<input type=submit name="btnLimpiar" 
								class="btnLimpiar  btn btn-outline-dark float-right "
								value="Limpiar">
		</div>
	</div>
<?php

include_once('../HTML/Footer.php');
?>