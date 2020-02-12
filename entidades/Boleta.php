<?php
include_once('../entidades/IOperaciones.php');
include_once('../entidades/Conectar.php');
class Boleta implements IOperaciones
{
	private $id;
	private $idUsuario;
	private $idSucursal;
	private $fechaBoleta;
	private $total;
	
	
	function getId()
	{
		return $this->id;
	}	
	function getIdUsuario()
	{
		return $this->idUsuario;
	}	
	function getIdSucursal()
	{
		return $this->idSucursal;
	}	
	function getFechaBoleta()
	{
		return $this->fechaBoleta;
	}
	function getTotal()
	{
		return $this->total;
	}
	
	
	
	function setId($id)
	{
		$this->id = $id;
	}	
		
	function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}
        function setIdSucursal($idSucursal)
	{
		$this->idSucursal = $idSucursal;
	}
	function setFechaBoleta($fechaBoleta)
	{
		$this->fechaBoleta = $fechaBoleta;
	}	
	function setTotal($total)
	{
		$this->total = $total;
	}	
	
	
	public function __construct()
	{
		$this->limpiar();
	}
	function grabar()
	{
		if($this->id > 0)
			$sql = "UPDATE BOLETA SET ".
						" idUsuario			    = '$this->idUsuario',".
						" idSucursal 		    = '$this->idSucursal',".
						" fecha	    = '$this->fechaBoleta',".
						" total 				= '$this->total'".
					" WHERE idBoleta = '$this->id'";
		
		else
			$sql = "INSERT INTO BOLETA VALUES (NULL,'$this->idUsuario',".
													"'$this->idSucursal',".
													"'$this->fechaBoleta',".
													"'$this->total')";
		$con = new Conectar();
		return $con->grabar($sql);
	}
	function listar()
	{
		$sql = "SELECT B.idBoleta		,
                       B.idUsuario			,
                       B.idSucursal		,
                       B.fecha		,	
                       B.total			,
					   U.nombre as Usuario,
					   S.nombre as Sucursal
					   
		FROM BOLETA  B
			INNER JOIN Usuario U		  ON U.idUsuario	      = B.idUsuario
			INNER JOIN Sucursal S 	  ON S.idSucursal	  = B.idSucursal
			
		
		WHERE 1=1 ";
		
		if($this->fechaBoleta)
			$sql .= " AND B.fecha = $this->fechaBoleta";
		if($this->idUsuario)
			$sql .= " AND B.idUsuario = $this->idProveedor";
		if($this->total)
			$sql .= " AND B.total LIKE '%$this->total%'";
		
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id				= 0;
		$this->idUsuario			= 0;
		$this->idSucursal		= 0;
		$this->fechaBoleta			= "";
		$this->total				= 0;
		
	}
	
	function cmbUsuario()
	{
		$con = new Conectar();
		return $con->comboBox("cmbUsuario", 
								"idUsuario", 
								"Nombre", 
								"Usuario", 
								"activo = 1",
								"cmbUsuario form-control");	
	}
	
	function cmbSucursal()
	{
		$con = new Conectar();
		return $con->comboBox("cmbSucursal", 
								"idSucursal", 
								"Nombre", 
								"Sucursal", 
								"activo = 1",
								"cmbSucursal form-control");	
	}
}


?>