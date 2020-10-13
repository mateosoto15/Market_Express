function Delete($this){
  //sweetAlert
  swal({
		title: "Esta Seguro?",
		text: $this.attr('title'),
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Si, Eliminar",
		cancelButtonText: "No, cancelar!",
		closeOnConfirm: false,
		closeOnCancel: false
		}, function(isConfirm) {
		  if (isConfirm) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type:'POST',
				url: $this.data('url'),
				statusCode: {
					403: function (xhr) {
						swal("No tiene los permisos suficientes!", "No se pudo eliminar, por favor contactar la división de sistemas.", "error");
					}
				},
				success:function(data){
					swal({title: "Eliminado!", text: "Ha sido eliminado correctamente.", type: "success"},function(){
						location.reload();
					});
				 
				},
				onerror:function(e){
					console.log(e);
					swal("Algo salio mal!", "No se pudo eliminar, por favor contactar la división de sistemas.", "error");
				},
			});
		} else {
			swal("Cancelado", "El proceso fue cancelado correctamente", "error");
			}
		});
}

function approved($this){
  //sweetAlert
  swal({
		title: "Esta Seguro?",
		text: $this.attr('title'),
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Si, Aprobar",
		cancelButtonText: "No, cancelar!",
		closeOnConfirm: false,
		closeOnCancel: false
		}, function(isConfirm) {
		  if (isConfirm) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type:'POST',
				url: $this.data('url'),
				statusCode: {
					403: function (xhr) {
						swal("No tiene los permisos suficientes!", "No se pudo aprobar, por favor contactar la división de sistemas.", "error");
					}
				},
				success:function(data){
					swal({title: "Aprobado!", text: "Ha sido aprobado correctamente.", type: "success"},function(){
						location.reload();
					});
				 
				},
				onerror:function(e){
					console.log(e);
					swal("Algo salio mal!", "No se pudo aprobar, por favor contactar la división de sistemas.", "error");
				},
			});
		} else {
			swal("Cancelado", "El proceso fue cancelado correctamente", "error");
			}
		});
}

function Decline($this){
  //sweetAlert
  swal({
		title: "Esta Seguro?",
		text: $this.attr('title'),
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Si, Declinar",
		cancelButtonText: "No, cancelar!",
		closeOnConfirm: false,
		closeOnCancel: false
		}, function(isConfirm) {
		  if (isConfirm) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type:'POST',
				url: $this.data('url'),
				statusCode: {
					403: function (xhr) {
						swal("No tiene los permisos suficientes!", "No se pudo declinar, por favor contactar la división de sistemas.", "error");
					}
				},
				success:function(data){
					swal({title: "Declinado!", text: "Ha sido declinado correctamente.", type: "success"},function(){
						location.reload();
					});
				 
				},
				onerror:function(e){
					console.log(e);
					swal("Algo salio mal!", "No se pudo declinar, por favor contactar la división de sistemas.", "error");
				},
			});
		} else {
			swal("Cancelado", "El proceso fue cancelado correctamente", "error");
			}
		});
}

function MakeAdmin($this){
  //sweetAlert
  swal({
		title: "Esta Seguro?",
		text: 'El usuario quedará con permisos de administrador',
		type: "error",
		showCancelButton: true,
		confirmButtonText: "Si",
		cancelButtonText: "No, cancelar!",
		closeOnConfirm: false,
		closeOnCancel: false
		}, function(isConfirm) {
		  if (isConfirm) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type:'POST',
				url: $this.data('url'),
				statusCode: {
					403: function (xhr) {
						swal("No tiene los permisos suficientes!", "por favor contactar la división de sistemas.", "error");
					}
				},
				success:function(data){
					swal({title: "Hecho!", text: "Ha sido designado correctamente.", type: "success"},function(){
						location.reload();
					});
				 
				},
				onerror:function(e){
					console.log(e);
					swal("Algo salio mal!", "No se pudo asignar, por favor contactar la división de sistemas.", "error");
				},
			});
		} else {
			swal("Cancelado", "El proceso fue cancelado correctamente", "error");
			}
		});
}