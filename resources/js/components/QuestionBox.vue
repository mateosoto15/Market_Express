
<template>
	<div class="form-group">
		<div v-for="(questions,index) in new_" ref="" class="">
			<div class="form-group">
				<label class="control-label">Titulo Pregunta {{ index + 1 }}</label>
				<input id="title" type="text" class="form-control " name="title[]"  required autocomplete="title" placeholder="Nombre" autofocus>

			</div>
			<div class="col-md-9 mx-auto">
				<div class="form-group">
					<label class="control-label">Respuesta A</label>
					<div class="row">
						<input type="text" required name="answer_A[]" class="form-control col-md-8" >
						<div class="col-md-4 pl-5 form-check">
							<input type="checkbox" :name="'answer_A_right[' + index + ']'" class="form-check-input">
							<label class="form-check-label">Correcta</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Respuesta B</label>
					<div class="row">
						<input type="text" required name="answer_B[]" class="form-control col-md-8" >
						<div class="col-md-4 pl-5 form-check">
							<input type="checkbox" :name="'answer_B_right[' + index + ']'" class="form-check-input">
							<label class="form-check-label">Correcta</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Respuesta C</label>
					<div class="row">
						<input type="text" required name="answer_C[]" class="form-control col-md-8" >
						<div class="col-md-4 pl-5 form-check">
							<input type="checkbox" :name="'answer_C_right[' + index + ']'" class="form-check-input">
							<label class="form-check-label">Correcta</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Respuesta D</label>
					<div class="row">
						<input type="text" required name="answer_D[]" class="form-control col-md-8" >
						<div class="col-md-4 pl-5 form-check">
							<input type="checkbox" :name="'answer_D_right[' + index + ']'" class="form-check-input">
							<label class="form-check-label">Correcta</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
	props: ['new_'],
  };
</script>