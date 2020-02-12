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
		if($('.cmbMarca').val() == "0")
		{
			alert('Falta seleccionar Marca');
			$('.cmbMarca').focus();
			return false;
		}
		if($('.cmbProveedor').val() == "0")
		{
			alert('Falta seleccionar Proveedor');
			$('.cmbProveedor').focus();
			return false;
		}
		if($('.cmbTipoProducto').val() == "0")
		{
			alert('Falta seleccionar Tipo de Producto');
			$('.cmbTipoProducto').focus();
			return false;
		}
		if(!$.trim($('.txtCodigo').val()).length)
		{
			alert('Falta especificar Codigo de Producto');
			$('.txtRut').focus();
			return false;
		}
		if(!$.trim($('.txtDescripcion').val()).length)
		{
			alert('Falta especificar Descripcion');
			$('.txtDescripcion').focus();
			return false;
		}	
		if(!$.trim($('.txtStock').val()).length)
		{
			alert('Falta especificar Stock');
			$('.txtStock').focus();
			return false;
		}		
		if(!$.trim($('.txtStockMinimo').val()).length)
		{
			alert('Falta especificar Stock Minimo');
			$('.txtStockMinimo').focus();
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
				$('.cmbMarca').val($(this).text());
			else if(index == 2)
				$('.cmbProveedor').val($(this).text());
			else if(index == 3)
				$('.cmbTipoProducto').val($(this).text());
			else if(index == 4)
				$('.txtCodigo').val($(this).text());
			else if(index == 5)
				$('.txtDescripcion').val($(this).text());
			else if(index == 6)
				$('.txtStock').val($(this).text());
			else if(index == 7)
				$('.txtStockMinimo').val($(this).text());
			
			
		});		
	});
	
});