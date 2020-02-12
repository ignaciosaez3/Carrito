$(function()
{
	$('.0, .1, .2, .3').hide();
	$('.datagrid table tr td:nth-child(1)').hide();
	$('.datagrid table tr td:nth-child(2)').hide();
	$('.datagrid table tr td:nth-child(3)').hide();
	$('.datagrid table tr td:nth-child(4)').hide();
	
	/* validar los caracteres que debe soportar cada una de las cajas de texto */
	$('.btnGrabar').click(function()
	{
		if($('.cmbSucursal').val() == "0")
		{
			alert('Falta seleccionar Sucursal');
			$('.cmbSucursal').focus();
			return false;
		}
		if(!$.trim($('.txtRut').val()).length)
		{
			alert('Falta especificar Rut');
			$('.txtRut').focus();
			return false;
		}
		if(!$.trim($('.txtDigito').val()).length)
		{
			alert('Falta especificar Dígito');
			$('.txtDigito').focus();
			return false;
		}	
		if(!$.trim($('.txtNombre').val()).length)
		{
			alert('Falta especificar nombre');
			$('.txtNombre').focus();
			return false;
		}
                if(!$.trim($('.txtNomPaterno').val()).length)
		{
			alert('Falta especificar apellido paterno');
			$('.txtNomPaterno').focus();
			return false;
		}
                if(!$.trim($('.txtNomMaterno').val()).length)
		{
			alert('Falta especificar apellido materno');
			$('.txtNomMaterno').focus();
			return false;
		}
                if(!$.trim($('.txtClave').val()).length)
		{
			alert('Falta especificar clave');
			$('.txtClave').focus();
			return false;
		}
	});
	
	$('.datagrid').on('click', 'table tr', function()
	{
		var fila = $(this);
		$(this).children("td").each(function(index)
		{
			if(index == 0)
				$('.txtId').val($(this).text());
			else if(index == 1)
				$('.cmbSucursal').val($(this).text());
			else if(index == 2)
				$('.txtRut').val($(this).text());
			else if(index == 3)
				$('.txtDigito').val($(this).text());
			else if(index == 4)
				$('.txtNombre').val($(this).text());
			else if(index == 5)
                                $('.txtNomPaterno').val($(this).text());
			else if(index == 6)
                                $('.txtNomMaterno').val($(this).text());
			else if(index == 7)
                                $('.txtClave').val($(this).text());
                        else if(index == 7)
                        {
                            var checked = $(this).text() == "1" ? true : false;
                            $('.chkActivo').prop('checked', checked);
                        }
                        else if(index == 8)
                        {
                            var checked = $(this).text() == "1" ? true : false;
                            $('.chkEsVendedor').prop('checked', checked);
                        }
		});		
	});
	
});