<?php
include_once('../entidades/IOperaciones.php');
include_once('../entidades/Conectar.php');
class Proveedor implements IOperaciones
{
	private $id;
	private $nombre;
	private $activo;
	
	function getId()
	{
		return $this->id;
	}
	function getNombre()
	{
		return $this->nombre;
	}
	function getActivo()
	{
		return $this->activo;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	function setNombre($nombre)
	{
		$this->nombre = $nombre;
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
			$sql = "UPDATE PROVEEDOR SET ".
						" NOMBRE 	='$this->nombre',".
						" ACTIVO 	='$this->activo'".
					" WHERE IDPROVEEDOR = '$this->id'";
		
		else
			$sql = "INSERT INTO PROVEEDOR VALUES (NULL,'$this->nombre',".
													"'$this->activo')";
		$con = new Conectar();
		return $con->grabar($sql);
	}
	function listar()
	{
		$sql = "SELECT * FROM PROVEEDOR WHERE nombre LIKE '%$this->nombre%'";
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id		= 0;
		$this->nombre	= "";
		$this->activo	= 2;
	}
}
?>