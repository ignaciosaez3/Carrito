<?php
include_once('../entidades/IOperaciones.php');
include_once('../entidades/Conectar.php');
class Usuario implements IOperaciones
{
	private $id;
	private $idSucursal;
	private $rut;
	private $digito;
	private $nombre;
	private $nomPaterno;
	private $nomMaterno;
        private $clave;
	private $activo;
        private $esVendedor;
	
	function getId()
	{
		return $this->id;
	}	
	function getIdSucursal()
	{
		return $this->idSede;
	}	
	function getRut()
	{
		return $this->rut;
	}
	function getDigito()
	{
		return $this->digito;
	}
	function getNombre()
	{
		return $this->nombre;
	}
	function getNomPaterno()
	{
		return $this->nomPaterno;
	}

	function getNomMaterno()
	{
		return $this->nomMaterno;
	}
	function getClave()
	{
		return $this->clave;
	}
        function getActivo()
	{
		return $this->activo;
	}
        function getEsVendedor()
	{
		return $this->esVendedor;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}	
	function setIdSucursal($idSucursal)
	{
		$this->idSucursal = $idSucursal;
	}		
	function setRut($rut)
	{
		$this->rut = $rut;
	}	
	function setDigito($digito)
	{
		$this->digito = $digito;
	}
	function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	function setNomPaterno($nomPaterno)
	{
		$this->nomPaterno = $nomPaterno;
	}
	function setNomMaterno($nomMaterno)
	{
		$this->nomMaterno = $nomMaterno;
	}
	function setClave($clave)
	{
		$this->clave = $clave;
	}
        function setActivo($activo)
	{
		$this->activo = $activo;
	}
        function setEsVendedor($esVendedor)
	{
		$this->esVendedor = $esVendedor;
	}
	
	
	public function __construct()
	{
		$this->limpiar();
	}
	function grabar()
	{
		if($this->id > 0)
			$sql = "UPDATE USUARIO SET ".
						" idSucursal 			= '$this->idSucursal',".
						" rut 				= '$this->rut',".
						" digito 			= '$this->digito',".
						" nombre 			= '$this->nombre',".
						" paterno 	= '$this->nomPaterno',".
						" materno 		= '$this->nomMaterno',".
						" clave 	= '$this->clave',".
                                                " activo 	= '$this->activo',".
                                                " esVendedor 	= '$this->esVendedor'".
					" WHERE idUsuario = '$this->id'";
		
		else
			$sql = "INSERT INTO USUARIO VALUES (NULL,'$this->idSucursal',".
													"'$this->rut',".
													"'$this->digito',".
													"'$this->nombre',".
													"'$this->nomPaterno',".
													"'$this->nomMaterno',".
													"'$this->clave',".
                                                                                                        "'$this->activo',".
                                                                                                        "'$this->esVendedor')";
		$con = new Conectar();
		return $con->grabar($sql);
	}
	function listar()
	{
		$sql = "SELECT U.idUsuario		,
                       U.idSucursal			,
                       U.rut			,	
                       U.digito			,
                       U.nombre			,
                       U.paterno			,
                       U.materno			,
                       U.clave			,
                       (case when U.activo = 1 then 'SI' else 'NO' end) AS 'Activo',
                       (case when U.esVendedor = 1 then 'SI' else 'NO' end) AS 'Vendedor',
					   S.nombre as Sucursal
					   
		FROM USUARIO U 
			INNER JOIN Sucursal S 		ON S.idSucursal 	= U.idSucursal
			
		
		WHERE 1=1 ";
		
		if($this->rut)
			$sql .= " AND A.rut = $this->rut";
		if($this->idSucursal)
			$sql .= " AND A.idSucursal = $this->idSucursal";
		if($this->nombre)
			$sql .= " AND A.nombre LIKE '%$this->nombre%'";
		
		$con = new Conectar();
		return $con->listar($sql);
	}
	function limpiar()
	{
		$this->id				= 0;
		$this->idSucursal			= 0;
		$this->rut				= 0;
		$this->digito			= "";
		$this->nombre			= "";
		$this->nomPaterno	= "";
                $this->nomMaterno	= "";
                $this->clave	= "";
		$this->activo			= 2;
                $this->esVendedor			= 2;
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