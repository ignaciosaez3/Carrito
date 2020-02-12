<?php
	/* invoca el archivo con la clase*/
	include_once('../entidades/Detalle.php');
	/* creación  de instancia */
	$detalle = new Detalle();
	if(isset($_POST['btnGrabar']))
	{
		/* traspaso de información enviada por el usuario a la instancia */
		$detalle->setId($_POST['txtId']);
		$detalle->setIdBoleta($_POST['cmbBoleta']);
		$detalle->setIdProducto($_POST['cmbProducto']);
		$detalle->setCantidad($_POST['txtCantidad']);
                $detalle->setPrecio($_POST['txtPrecio']);
                $detalle->setSubTotal($_POST['txtSubTotal']);
		/* graba la información traspasada en el punto anterior*/
		$detalle->grabar();
		$exito = "Datos guardados";		
	}
	else if(isset($_POST['btnListar']))
	{
		$detalle->setCantidad($_POST['txtCantidad']);
		$detalle->setIdProducto($_POST['cmbProducto']);
		$detalle->setPrecio($_POST['txtPrecio']);
		$tabla = $detalle->listar();
	}

	$js = 'Detalle.js';
	include_once('../HTML/Head.php');
?>
	<div class="row">
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-10">
			<h2>Detalle</h2>
		</div>
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Total de la Boleta
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $detalle->cmbBoleta();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Descripcion del Producto
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $detalle->cmbProducto();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
                <div class="col-12 col-sm-2">
			Cantidad
		</div>
		<div class="col-12 col-sm-4">
                    <input type=number name="txtCantidad" 
								class="txtCantidad form-control"
								size=20
								maxlength=100>
		</div>		
                <div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Precio
		</div>
		<div class="col-12 col-sm-4">
                    <input type=number name="txtPrecio" 
								class="txtPrecio form-control"
								size=20
								maxlength=100>
		</div>		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Sub Total
		</div>
		<div class="col-12 col-sm-4">
                    <input type=number name="txtSubTotal" 
								class="txtSubTotal form-control"
								size=20
								maxlength=100>
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