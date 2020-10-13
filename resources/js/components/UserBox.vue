
<template>
	<div class="form-group">
		<div v-for="(users, index) in new_" ref="" class="">
			
				
			<label class="control-label">Usuario</label>
			<select name="users[]" class="form-control selectUsers" data-url="/admin/users/get_all_users" placeholder="Seleccionar usuario">
				
			</select>

		</div>
	</div>
</template>

<script>
  export default {
	props: ['new_'],

  };
</script>