<template>
	<transition
	    name="custom-classes-transition"
	    enter-active-class="animated tada"
	    leave-active-class="animated bounceOutRight"
	    appear
	>
		<b-modal id="congrats" size="sm"  no-close-on-backdrop  centered hide-footer hide-header title="Felicidades">
			<div class="text-center">
				{{ message }}
			</div>
		</b-modal>
	</transition>
</template>

<script>
  export default {
	props: ['message', 'congrats'],
	data() {
      return {
        selected: ''
      }
    },
    watch: {
	    congrats: function (val) {
	      if(val){
	      	this.$bvModal.show('congrats');
	      }else{
	      	this.$bvModal.hide('congrats');
	      }
	    },
	}
  };
</script>