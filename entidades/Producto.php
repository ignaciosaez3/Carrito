<?php
include_once('../entidades/IOperaciones.php');
include_once('../entidades/Conectar.php');
class Producto implements IOperaciones
{
	private $id;
	private $idMarca;
	private $idProveedor;
	private $idTipoProducto;
	private $codigo;
	private $descripcion;
	private $stock;
	private $stockMinimo;
	private $precio;
	private $activo;
	
	function getId()
	{
		return $this->id;
	}	
	function getIdMarca()
	{
		return $this->idMarca;
	}	
	function getIdProveedor()
	{
		return $this->idProveedor;
	}	
	function getIdTipoProducto()
	{
		return $this->idTipoProducto;
	}
	function getCodigo()
	{
		return $this->codigo;
	}
	function getStock()
	{
		return $this->stock;
	}
	function getStockMinimo()
	{
		return $this->stockMinimo;
	}
	function getPrecio()
	{
		return $this->precio;
	}

	function getActivo()
	{
		return $this->activo;
	}
	
	
	function setId($id)
	{
		$this->id = $id;
	}	
	function setIdMarca($idMarca)
	{
		$this->idMarca = $idMarca;
	}	
	function setIdProveedor($idProveedor)
	{
		$this->idProveedor = $idProveedor;
	}	
	function setIdTipoProducto($idTipoProducto)
	{
		$this->idTipoProducto = $idTipoProducto;
	}	
	function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}	
	function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}
	function setStock($stock)
	{
		$this->stock = $stock;
	}
	function setStockMinimo($stockMinimo)
	{
		$this->stockMinimo = $stockMinimo;
	}
	function setPrecio($precio)
	{
		$this->precio = $precio;
	}
	function setActivo($activo)
	{
		$this->activo = $activo;
	}
	
	public function __construct()
	{
		$this->limpiar();
	}
	function grabar()
	{
		if($this->id > 0)
			$sql = "UPDATE PRODUCTO SET ".
						" idMarca			    = '$this->idMarca',".
						" idProveedor 		    = '$this->idProveedor',".
						" idTipoProducto 	    = '$this->idTipoProducto',".
						" codigo 				= '$this->codigo',".
						" descripcion 			= '$this->descripcion',".
						" stock 			    = '$this->stock',".
						" stockMinimo 	        = '$this->stockMinimo',".
						" precio 		        = '$this->precio',".
						" activo 	            = '$this->activo'".
					" WHERE idProducto = '$this->id'";
		
		else
			$sql = "INSERT INTO PRODUCTO VALUES (NULL,'$this->idMarca',".
													"'$this->idProveedor',".
													"'$this->idTipoProducto',".
													"'$this->codigo',".
													"'$this->descripcion',".
													"'$this->stock',".
													"'$this->stockMinimo',".
													"'$this->precio',".
													"'$this->activo')";
		$con = new Conectar();
		return $con->grabar($sql);
	}
	function listar()
	{
		$sql = "SELECT P.idProducto		,
                       P.idMarca			,
                       P.idProveedor		,
                       P.idTipoProducto		,	
                       P.codigo			,	
                       P.descripcion			,
                       P.stock			,
                       P.stockMinimo    ,
                       P.precio          ,
                       (case when P.activo = 1 then 'SI' else 'NO' end) AS Activo          ,
					   M.nombre as Marca ,
					   V.nombre as Proveedor,
					   T.nombre as TipoProducto
					   
		FROM PRODUCTO P 
			INNER JOIN Marca M		  ON M.idMarca	      = P.idMarca
			INNER JOIN Proveedor V 	  ON V.idProveedor	  = P.idProveedor
			INNER JOIN TipoProducto T ON T.idTipoProducto = P.idTipoProducto
		
		WHERE 1=1 ";
		
		if($this->codigo)
			$sql .= " AND P.codigo = $this->codigo";
		if($this->idProveedor)
			$sql .= " AND P.idProveedor = $this->idProveedor";
		if($this->descripcion)
			$sql .= " AND p.descripcion LIKE '%$this->descripcion%'";
		
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id				= 0;
		$this->idMarca			= 0;
		$this->idProveedor		= 0;
		$this->idTipoProducto			= 0;
		$this->codigo				= 0;
		$this->descripcion			= "";
		$this->stock			= "";
		$this->stockMinimo	= "";
		$this->tipoPractica		= 0;
		$this->precio			= 0;
	}
	
	function cmbMarca()
	{
		$con = new Conectar();
		return $con->comboBox("cmbMarca", 
								"idMarca", 
								"Nombre", 
								"Marca", 
								"activo = 1",
								"cmbMarca form-control");	
	}
	
	function cmbProveedor()
	{
		$con = new Conectar();
		return $con->comboBox("cmbProveedor", 
								"idProveedor", 
								"Nombre", 
								"Proveedor", 
								"activo = 1",
								"cmbProveedor form-control");	
	}
	function cmbTipoProducto()
	{
		$con = new Conectar();
		return $con->comboBox("cmbTipoProducto", 
								"idTipoProducto", 
								"Nombre", 
								"TipoProducto", 
								"activo = 1",
								"cmbTipoProducto form-control");	
	}
}


?>