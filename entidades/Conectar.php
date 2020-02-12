<?php

class Conectar
{
	function conexion()
	{
		try
		{
			$conexion = new mysqli();
			$conexion->connect('localhost','root', '', 'practicas1');
			return $conexion;
		}
		catch(Exception $e)
		{
			die("Ocurrio el siguiente error: ".$e);
		}
	}

	function grabar($sqlString)
	{
		$con = self::conexion();

		if(!$con || $con->connect_error)
			die('Error en la conexión con el servidor');

		$resultado = mysqli_query($con, utf8_decode($sqlString));

		if($con->errno)
			die('Error en la ejecución de la sentencia 1: '.$sqlString.'<br>Nro:'.$con->errno."<br>".$con->error);
		
		return 1;
	/*
		if(!$resultado->num_rows)
			return;

		$arr = mysqli_fetch_array($resultado, MYSQLI_BOTH);
		
		if($arr[0] < 0)
			die('Error en la ejecución de la sentencia.<br>Nro:'.$arr[0]."<br>".$arr[1]);
		else
			return $arr;
		*/
	}
	
	function listar($sqlString)
	{
		$con = self::conexion();

		if(!$con || $con->connect_error)
			die("No se puede conectar al servidor de datos.");
        $con->set_charset("utf8");
		$resultado = mysqli_query($con, ($sqlString));
		if($con->errno)
			die('Error en la ejecución de la sentencia: '.$sqlString.'<br>Nro:'.$con->errno."<br>".$con->error);

		if($resultado == null || !$resultado->num_rows)
			return 'No se encontro coincidencias';
		
		$head = '';
		$columnas = $resultado->fetch_fields();
		
		$indice = 0;
		foreach ($columnas as $nombre)
		{
			$head .= "<th class='$indice'>".$nombre->name.'</th>';
			$indice++;
		}
		$head = "<thead><tr>$head</tr></thead>";
		
		$tr		= '';
		
		while($row = mysqli_fetch_array($resultado, MYSQLI_NUM))
		{
			$tr .= "<tr>";
			for($i = 0; $i < count($row); $i++)
				$tr .= "<td>".$row[$i]."</td>"; 
			$tr .="</tr>";
		}

		return '<div class=datagrid><table class=tabla>'.$head.$tr.'</table></div>';		
		
	}
	
	function listarJson($sqlString)
	{
		$con = self::conexion();

		if(!$con || $con->connect_error)
			die("No se puede conectar al servidor de datos.");
		 
		 /* echo $sqlString;  */
        $con->set_charset("utf8");
		$resultado = mysqli_query($con, ($sqlString));

		if($con->errno)
			die('Error en la ejecución de la sentencia: '.$sqlString.'<br>Nro:'.$con->errno."<br>".$con->error);

		if($resultado == null || $resultado->num_rows == 0)
			return 'No se encontro coincidencias';
		
		if($resultado->num_rows == 1)
		{
			while($fila = mysqli_fetch_array( $resultado, MYSQLI_ASSOC))
				$datos = $fila;/*array_map("utf8_encode", $fila);/* */
		}
		else
		{
			while($fila = mysqli_fetch_array( $resultado, MYSQLI_ASSOC))
				$datos[] =  $fila;/*array_map("utf8_encode", $fila);/*  */
		}			
		
		return json_encode($datos);
	}
	
	function comboBox($nombreCombo, $pk, $option, $tabla, $condicion = '', $class = '')
	{
		$con = self::conexion();

		if(!$con || $con->connect_error)
			die("No se puede conectar al servidor de datos.");		
		
		$condicion = $condicion ? " WHERE 1=1 AND $condicion" : "";
		
		$sqlString = "SELECT $pk, $option FROM $tabla $condicion ORDER BY $option ";
		
		if(!$class)
			$class = $nombreCombo;
        $con->set_charset("utf8");
		$resultado = mysqli_query($con, $sqlString);
		
		if($con->errno)
			die('Error en la ejecución de la sentencia. Cod.: '.$con->errno.
				'Mensaje: '.$con->error);
		
		if(!$resultado->num_rows)
			return "<select name=$nombreCombo class='$nombreCombo $class'>".
					"<option value=0></option></select>";
		
		$opcion = '<option value=0>Seleccionar</option>';
		while($row = mysqli_fetch_array($resultado, MYSQLI_NUM))
			$opcion .= '<option value="'.$row[0].'">'.$row[1].'</option>';
		
		return "<select name=$nombreCombo class='$nombreCombo $class'>$opcion</select>";			
	}
}
?>