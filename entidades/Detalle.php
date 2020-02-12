<?php
include_once('../entidades/IOperaciones.php');
include_once('../entidades/Conectar.php');
class Detalle implements IOperaciones
{
	private $id;
	private $idBoleta;
	private $idProducto;
	private $cantidad;
	private $precio;
	private $subTotal;
	
	
	function getId()
	{
		return $this->id;
	}	
	function getIdBoleta()
	{
		return $this->idBoleta;
	}	
	function getIdProducto()
	{
		return $this->idProducto;
	}	
	function getCantidad()
	{
		return $this->cantidad;
	}
	function getPrecio()
	{
		return $this->precio;
	}
	function getSubTotal()
	{
		return $this->subTotal;
	}
	
	
	
	function setId($id)
	{
		$this->id = $id;
	}	
	function setIdBoleta($idBoleta)
	{
		$this->idBoleta = $idBoleta;
	}	
	function setIdProducto($idProducto)
	{
		$this->idProducto = $idProducto;
	}	
	function setCantidad($cantidad)
	{
		$this->cantidad = $cantidad;
	}
        function setPrecio($precio)
	{
		$this->precio = $precio;
	}
	function setSubTotal($subTotal)
	{
		$this->subTotal = $subTotal;
	}	
	
	
	public function __construct()
	{
		$this->limpiar();
	}
	function grabar()
	{
		if($this->id > 0)
			$sql = "UPDATE DETALLE SET ".
						" idBoleta			    = '$this->idBoleta',".
						" idProducto 		    = '$this->idProducto',".
						" cantidad 	    = '$this->cantidad',".
						" precio 				= '$this->precio',".
						" subTotal 			= '$this->subTotal'".
					" WHERE idDetalle = '$this->id'";
		
		else
			$sql = "INSERT INTO DETALLE VALUES (NULL,'$this->idBoleta',".
													"'$this->idProducto',".
													"'$this->cantidad',".
													"'$this->precio',".
													"'$this->subTotal')";
		$con = new Conectar();
		return $con->grabar($sql);
	}
	function listar()
	{
		$sql = "SELECT D.idDetalle		,
                       D.idBoleta			,
                       D.idProducto		,
                       D.cantidad		,	
                       D.precio			,	
                       D.subTotal			
					  
					  
					   
		FROM DETALLE D 
			INNER JOIN Boleta B		  ON B.idBoleta	      = D.idBoleta
			INNER JOIN Producto P 	  ON P.idProducto	  = D.idProducto
			
		
		WHERE 1=1 ";
		
		if($this->cantidad)
			$sql .= " AND D.cantidad = $this->cantidad";
		if($this->idProducto)
			$sql .= " AND D.idProducto = $this->idProducto";
		if($this->precio)
			$sql .= " AND D.precio LIKE '%$this->precio%'";
		
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id				= 0;
		$this->idBoleta			= 0;
		$this->idProducto		= 0;
		$this->cantidad			= 0;
		$this->precio				= 0;
		$this->subTotal			= 0;
		
	}
	
	function cmbBoleta()
	{
		$con = new Conectar();
		return $con->comboBox("cmbBoleta", 
								"idBoleta", 
								"Total", 
								"Boleta", 
								"Total>0",
								"cmbBoleta form-control");	
	}
	
	function cmbProducto()
	{
		$con = new Conectar();
		return $con->comboBox("cmbProducto", 
								"idProducto", 
								"Descripcion", 
								"Producto", 
								"Stock>0",
								"cmbProducto form-control");	
	}
	
}


?>