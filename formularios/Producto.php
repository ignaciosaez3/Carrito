<?php
	/* invoca el archivo con la clase*/
	include_once('../entidades/Producto.php');
	/* creación  de instancia */
	$producto = new Producto();
	if(isset($_POST['btnGrabar']))
	{
		/* traspaso de información enviada por el usuario a la instancia */
		$producto->setId($_POST['txtId']);
		$producto->setIdMarca($_POST['cmbMarca']);
		$producto->setIdProveedor($_POST['cmbProveedor']);
		$producto->setIdTipoProducto($_POST['cmbTipoProducto']);
		$producto->setCodigo($_POST['txtCodigo']);
		$producto->setDescripcion($_POST['txtDescripcion']);
		$producto->setStock($_POST['txtStock']);
		$producto->setStockMinimo($_POST['txtStockMinimo']);
                $producto->setPrecio($_POST['txtPrecio']);
                $producto->setActivo(isset($_POST['chkActivo']));
		/* graba la información traspasada en el punto anterior*/
		$producto->grabar();
		$exito = "Datos guardados";		
	}
	else if(isset($_POST['btnListar']))
	{
		$producto->setDescripcion($_POST['txtDescripcion']);
		$producto->setIdMarca($_POST['cmbMarca']);
		$producto->setCodigo($_POST['txtCodigo']);
		$tabla = $producto->listar();
	}

	$js = 'Producto.js';
	include_once('../HTML/Head.php');
?>
	<div class="row">
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-10">
			<h2>Producto</h2>
		</div>
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Marca
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $producto->cmbMarca();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Proveedor
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $producto->cmbProveedor();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Tipo Producto
		</div>
		<div class="col-12 col-sm-4">
			<input type=hidden name="txtId" class="txtId" value="0"> 
			<?php
				echo $producto->cmbTipoProducto();
			?>
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>		
		<div class="col-12 col-sm-2">
			Codigo
		</div>
		<div class="col-10 col-sm-3">
			<input type=number name="txtCodigo" 
								class="txtCodigo form-control"
								size=8
								maxlength=8>
		</div>
		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>		
		<div class="col-12 col-sm-2">
			Descripcion
		</div>
		<div class="col-12 col-sm-4">
			<input type=text name="txtDescripcion" 
								class="txtDescripcion form-control"
								size=20
								maxlength=100 
								placeholder="Ingrese la descripcion"
								title="La descipcion del producto">
		</div>
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>	
		<div class="col-12 col-sm-2">
			Stock
		</div>
		<div class="col-10 col-sm-3">
			<input type=number name="txtStock" 
								class="txtStock form-control"
								size=8
								maxlength=8>
		</div>	
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			Stock Minimo
		</div>
		<div class="col-10 col-sm-3">
			<input type=number name="txtStockMinimo" 
								class="txtStockMinimo form-control"
								size=8
								maxlength=8>
		</div>		
		<div class="col-12 col-sm-4">
		</div>
		
		<div class="col-12 col-sm-2">
		</div>
		<div class="col-12 col-sm-2">
			 Precio
		</div>
		<div class="col-10 col-sm-3">
			<input type=number name="txtPrecio" 
								class="txtPrecio form-control"
								size=8
								maxlength=8>
		</div>	
                        Activo
                <div class="col-1">
			<input type=checkbox name="chkActivo" 
								class="chkActivo"
								value=1
								title="Permite dar de baja a un producto">
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