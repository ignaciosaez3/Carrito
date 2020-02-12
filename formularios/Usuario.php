<?php
	/* invoca el archivo con la clase*/
	include_once('../entidades/Usuario.php');
	/* creación  de instancia */
	$usuario = new Usuario();
	if(isset($_POST['btnGrabar']))
	{
		/* traspaso de información enviada por el usuario a la instancia */
		$usuario->setId($_POST['txtId']);
		$usuario->setIdSucursal($_POST['cmbSucursal']);
		$usuario->setRut($_POST['txtRut']);
		$usuario->setDigito($_POST['txtDigito']);
		$usuario->setNombre($_POST['txtNombre']);
		$usuario->setNomPaterno($_POST['txtNomPaterno']);
                $usuario->setNomMaterno($_POST['txtNomMaterno']);
                $usuario->setClave($_POST['txtClave']);              
		$usuario->setActivo(isset($_POST['chkActivo']));
                $usuario->setEsVendedor(isset($_POST['chkEsVendedor']));
		/* graba la información traspasada en el punto anterior*/
		$usuario->grabar();
		$exito = "Datos guardados";		
	}
	else if(isset($_POST['btnListar']))
	{
		$usuario->setNombre($_POST['txtNombre']);
		$usuario->setIdSucursal($_POST['cmbSucursal']);
		$usuario->setRut($_POST['txtRut']);
		$tabla = $usuario->listar();
	}

	$js = 'Usuario.js';
	include_once('../HTML/Head.php');
?>
	<div class="row">
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-10">
			<h2>Usuario</h2>
		</div>
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Sucursal
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $usuario->cmbSucursal();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>		
		<div class="col-12 col-sm-2">
			Rut
		</div>
		<div class="col-10 col-sm-3">
			<input type=text name="txtRut" 
								class="txtRut form-control"
								size=8
								maxlength=8>
		</div>
		<div class="col-2 col-sm-1">
			<input type=text name="txtDigito" 
								class="txtDigito form-control"
								size=1
								maxlength=1>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>		
		<div class="col-12 col-sm-2">
			Nombre
		</div>
		<div class="col-12 col-sm-4">
			<input type=text name="txtNombre" 
								class="txtNombre form-control"
								size=20
								maxlength=100 
								placeholder="Ingrese nombre del Usuario">
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>	
		<div class="col-12 col-sm-2">
			Apellido Paterno
		</div>
		<div class="col-12 col-sm-4">
			<input type=text name="txtNomPaterno" 
								class="txtNomPaterno form-control">
		</div>		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Apellido Materno
		</div>
		<div class="col-12 col-sm-4">
			<input type=text name="txtNomMaterno" 
								class="txtNomMaterno form-control">
		</div>		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			 Clave
		</div>
		<div class="col-12 col-sm-4">
                    <input type=password name="txtClave" 
								class="txtClave form-control">
		</div>		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
                <div class="col-12 col-sm-2">
			 Activo
		</div>
                <div class="col-12 col-sm-4">
			<input type=checkbox name="chkActivo" 
								class="chkActivo"
								value=1
								title="Permite dar de baja al usuario">
		</div>
                <div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
                <div class="col-12 col-sm-2">
			 Es Vendedor
		</div>
                <div class="col-12 col-sm-4">
			<input type=checkbox name="chkEsVendedor" 
								class="chkEsVendedor"
								value=1
								title="Permite dar de baja al Vendedor">
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