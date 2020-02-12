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
		if($('.cmbBoleta').val() == "0")
		{
			alert('Falta seleccionar Boleta');
			$('.cmbUsuario').focus();
			return false;
		}
		if($('.cmbProducto').val() == "0")
		{
			alert('Falta seleccionar producto');
			$('.cmbProducto').focus();
			return false;
		}
                if(!$.trim($('.txtCantidad').val()).length)
		{
			alert('Falta especificar la cantidad');
			$('.txtCantidad').focus();
			return false;
		}
		if(!$.trim($('.txtPrecio').val()).length)
		{
			alert('Falta especificar el Precio');
			$('.txtPrecio').focus();
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
				$('.cmbBoleta').val($(this).text());
			else if(index == 2)
				$('.cmbProducto').val($(this).text());
			else if(index == 3)
                                $('.txtCantidad').val($(this).text());
			else if(index == 4)
                                $('.txtPrecio').val($(this).text());
                        else if(index == 4)
                                $('.txtSubTotal').val($(this).text());    
			
		});		
	});
	
});