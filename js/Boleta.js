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
		if($('.cmbUsuario').val() == "0")
		{
			alert('Falta seleccionar Usuario');
			$('.cmbUsuario').focus();
			return false;
		}
		if($('.cmbSucursal').val() == "0")
		{
			alert('Falta seleccionar sucursal');
			$('.cmbSucursal').focus();
			return false;
		}
                if(!$.trim($('.txtFechaBoleta').val()).length)
		{
			alert('Falta especificar fecha de la boleta');
			$('.txtFechaBoleta').focus();
			return false;
		}
		if(!$.trim($('.txtTotal').val()).length)
		{
			alert('Falta especificar el Total');
			$('.txtTotal').focus();
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
				$('.cmbUsuario').val($(this).text());
			else if(index == 2)
				$('.cmbSucursal').val($(this).text());
			else if(index == 3)
			{	
				var numbers = $(this).text().match(/\d+/g);//30-12-2019 -> 2019-12-30
				$('.txtFechaBoleta').val(numbers[2] + "-" + numbers[1] + "-" + numbers[0]);
			}
			else if(index == 4)
                                $('.txtTotal').val($(this).text());
			
		});		
	});
	
});