<template>
	<b-modal :body-bg-variant="'dark'" id="figth" size="xl" centered hide-footer hide-header-close no-close-on-backdrop title="Combat">
		<div class="row">
			<transition name="bounce" appear> 
				<div class="col-sm-4 text-center">
					<div v-if="user1" class="text-white">
						<img class="app-sidebar__user-avatar responsive-avatar" width="90" height="90" :src="user1.profile_photo_url" :alt="user1.name" />{{ user1 ? user1.name : ''  }}
					</div>
					
				</div>
			</transition>
			<div class="col-sm-4 text-center">
				<b-form-group :label="question.title">

					<div v-for="(answer,index) in question.answers">
    					<b-form-radio v-model="selected" name="answers" :value="answer.id">{{ answer.answer }}</b-form-radio>
					</div>
    			</b-form-group>
			</div>
			<transition name="bounce" appear> 
				<div class="col-sm-4">
					<div v-if="user2" class="text-white">
						{{ user2 ? user2.name : '' }}<img class="app-sidebar__user-avatar responsive-avatar" width="90" height="90" :src="user2.profile_photo_url" :alt="user2.name" />
					</div>
					
				</div>
			</transition>
		</div>
		<div class="row">
			<div class="col-md-9 mx-auto">
				<b-button class="mt-3" block @click="send()">Enviar</b-button>
			</div>
		</div>
	</b-modal>
</template>

<script>
  export default {
	props: ['question', 'user1', 'user2', 'dialog', 'single_combat_id', 'auth'],
	data() {
      return {
        selected: ''
      }
    },
    methods: {
    	send(){
    		var self = this;
    		axios.post('/admin/combats/single_combat/' + this.single_combat_id, {
    			user_id: self.auth.id,
    			question_id: self.question.id,
    			answer_id: self.selected,
    			user2_id: (self.user1.id == self.auth.id ) ? self.user2.id : self.user1.id
    		})
    		.then(function(response){
    			self.$bvModal.hide('figth');
    		})
    		.catch(function(response){
    			console.log(response);
    		});
    	}
    },
	watch: {
	    dialog: function (val) {
	      if(val){
	      	this.$bvModal.show('figth');
	      }else{
	      	this.$bvModal.hide('figth');
	      }
	    },
	}
  };
</script>