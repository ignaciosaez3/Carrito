<?php
	if(isset($_POST['btnGrabar']))
	{
		/* invoca el archivo con la clase*/
		include_once('../entidades/Proveedor.php');
		/* creación  de instancia */
		$proveedor = new Proveedor();
		/* traspaso de información enviada por el usuario a la instancia */
		$proveedor->setId($_POST['txtId']);
		$proveedor->setNombre($_POST['txtNombre']);
		$proveedor->setActivo(isset($_POST['chkActivo']));
		/* graba la información traspasada en el punto anterior*/
		$proveedor->grabar();
		echo "Datos guardados";		
	}
	else if(isset($_POST['btnListar']))
	{
		/* invoca el archivo con la clase*/
		include_once('../entidades/Proveedor.php');
		/* creación  de instancia */
		$proveedor = new Proveedor();
		$proveedor->setNombre($_POST['txtNombre']);
		$tabla = $proveedor->listar();
	}

	$js = 'Proveedor.js';
	include_once('../HTML/Head.php');
?>
	<div class="row">
		<h2>Proveedor</h2>
		<div class="col-12">
			Nombre
		</div>
		<div class="col-12">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<input type=text name="txtNombre" 
								class="txtNombre form-control"
								size=20
								maxlength=100>
		</div>
		<div class="col-12">
			Activo
		</div>
		<div class="col-1">
			<input type=checkbox name="chkActivo" 
								class="chkActivo"
								value=1
								title="Permite dar de baja a un tutor">
		</div>
		<div class="col-12">
			<input type=submit name="btnListar" 
								class="btnListar  btn btn-outline-success float-right "
								value="Listar">
			<input type=submit name="btnGrabar" 
								class="btnGrabar  btn btn-outline-danger float-right"
								value="Grabar">
			<input type=submit name="btnLimpiar" 
								class="btnLimpiar  btn btn-outline-dark float-right "
								value="Limpiar">
		</div>
	</div>
<?php

include_once('../HTML/Footer.php');
?>