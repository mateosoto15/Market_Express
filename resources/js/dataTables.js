$(document).ready(function(){


	//dataTable
	$('#table').DataTable({
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
	});


	// markets Table
	$('#markets_table').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
		"ajax": $('#markets_table').data('url'),
		"columns": [
			{ "data": "id"},
			{ "data": "name"},
			{ "data": "description"},
			{ "data": '' },
		],
		columnDefs: [
		{
		    targets: -1,
		    render: function (data, type, row, meta)
		    {
		        
		        data = '<a href="#" data-url="/admin/markets/delete/' + row.id + '" class="btn btn-outline-danger" onclick="Delete($(this));">Eliminar</a> <a href="/admin/markets/edit/' + row.id + '" class="btn btn-outline-info" >Editar</a>';
		        return data;
		    }
		}],
	});

	$('#markets_table_without_actions').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
		"ajax": $('#markets_table_without_actions').data('url'),
		"columns": [
			{ "data": "name"},
			{ "data": "description"},
			{ "data": 'address' },
		],
	});


	// permissions Table
	$('#permissions_table').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
		"ajax": $('#permissions_table').data('url'),
		"columns": [
			{ "data": "name"},
			{ "data": "description"},
			{ "data": '' },
		],
		columnDefs: [
		{
		    targets: -1,
		    render: function (data, type, row, meta)
		    {
		        
		        data = '<a href="#" data-url="/admin/permissions/delete/' + row.id + '" class="btn btn-outline-danger" onclick="Delete($(this));">Eliminar</a> <a href="/admin/permissions/edit/' + row.id + '" class="btn btn-outline-info" >Editar</a>';
		        return data;
		    }
		}],
	});
	
	// products Table
	$('#products_table').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
		"ajax": $('#products_table').data('url'),
		"columns": [
			{ "data": "id"},
			{ "data": "name"},
			{ "data": "description", "defaultContent": ""},
			{ "data": '' },
		],
		columnDefs: [
		{
		    targets: -1,
		    render: function (data, type, row, meta)
		    {
		        
		        data = '<a href="#" data-url="/admin/products/delete/' + row.id + '" class="btn btn-outline-danger" onclick="Delete($(this));">Eliminar</a> <a href="/admin/products/edit/' + row.id + '" class="btn btn-outline-info" >Editar</a>';
		        return data;
		    }
		}],
	});

	// assign permissions Table
	$('#assign_permissions').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
	});

	// users table
	$('#users_table').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
		"ajax": $('#users_table').data('url'),
		"columns": [
			{ "data": "name"},
			{ "data": "email"},
			{ "data": "role.name"},
			{ "data": '' },
		],
		columnDefs: [
		{
		    targets: -1,
		    render: function (data, type, row, meta)
		    {
		    	data = '';
		        if(row.role.name !== 'Admin'){
		        	data = data + '<a href="#" data-url="users/' + row.id + '/makeAdmin" class="btn btn-outline-danger" onclick="MakeAdmin($(this));" > Hacer Admin </a>';
		        }else{
			        data = data + '<a href="users/' + row.id + '/assignPermissions" class="btn btn-outline-warning" > Asignar Permisos </a>';
		        }
				return data;
		    }
		}],
	});

	

});