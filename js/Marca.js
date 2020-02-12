$(function()
{
	/* validar los caracteres que debe soportar cada una de las cajas de texto */
	$('.btnGrabar').click(function()
	{
		if(!$.trim($('.txtNombre').val()).length)
		{
			alert('Falta especificar nombre');
			$('.txtNombre').focus();
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
				$('.txtNombre').val($(this).text());
			else if(index == 2)
			{
				var checked = $(this).text()=="1" ? true:false;
				$('.chkActivo').prop('checked', checked);
			}
		});		
	});
	
});