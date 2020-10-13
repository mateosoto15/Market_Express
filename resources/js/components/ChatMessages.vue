
<template>
	<div class="" ref="messages_box" id="messages">
		<div v-for="message in messages" ref="messages_div">
			<div v-if="message.participation.messageable_id == user_from.id" class="message me"><img v-bind:src="'/images/small/user_'+message.participation.messageable_id+'.webp'" onerror="this.src='/images/small/perfil.png'">
				<p class="info">{{message.body}}</p>
			</div>
			<div v-else class="message"><img v-bind:src="'/images/small/user_'+message.participation.messageable_id+'.webp'" onerror="this.src='/images/small/perfil.png'">
				<p class="info">{{message.body}}</p>
			</div>
		</div>
	</div>
</template>

<script>
  export default {
	props: ['messages','user_from'],
	//this function is called after rendering and scrolling up to down
	updated : function (){
		this.$nextTick(function () {
			setTimeout(function(){
				$('.messages').scrollTop($('.messages').prop("scrollHeight"));
			}, 200);
		});
	},
  };
</script>