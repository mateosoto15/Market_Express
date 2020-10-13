
<template>
	<div class="form-group">
		<div v-for="(religions,index) in new_" ref="" class="row">
			<div class="col-md-4">
				
				<label class="control-label">Nombre</label>
				<input type="text" v-model="name[index]" class="form-control " >
					
			</div>
			<div class="col-md-4">
				<label class="control-label">Descripción</label>
				<input type="text"  class="form-control"  v-model="description[index]">
			</div>

			<div class="col-md-4">
				<label class="control-label">&nbsp;</label>

				<button type="button" class="form-control btn btn-outline-primary" v-on:click="save(index)">Guardar</button>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
	props: ['new_'],
	data() {
		return {
			name: [],
			description: []
		}
	},
	methods: {
		save: function(index){
			let self = this;

			axios.post('/admin/religions/create/',{
				name: this.name[index],
				description: this.description[index]
			})
			.then(function(response) {
				swal("Hecho!", 'Religión Creada', "success");
				self.new_.splice(index,1);
				self.name.splice(index,1);
				self.description.splice(index,1);
			})
			.catch(function(error){
				console.log(error);
				swal("Algo salió mal!", 'Puede ser que no tengas los permisos suficientes, o no llenaste alguno de los campos', "error");
			});
		}
	}
  };
</script>