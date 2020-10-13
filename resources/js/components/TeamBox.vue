
<template>
	<transition name="bounce" appear>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">	
					<div class="card-title text-center">{{ title }}</div>
					<div v-for="(user) in users[index]" ref="" class="row mt-2 mx-auto">
						<div class="mx-auto">
							<img class="app-sidebar__user-avatar responsive-avatar" width="90" height="90" :src="user.profile_photo_url" :alt="user.name" /><br></br>{{ user.name }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
  export default {
		props: ['users','users_to_emit', 'index', 'title', 'combat_id', 'auth', 'questions', 'dateend'],
		created() {
			this.usersemit();
		},
		methods:{
			usersemit(){
				this.$emit('usersemit', {users:this.users_to_emit, index: this.index, combat_id: this.combat_id, questions: this.questions, dateEnd: this.dateend});
			}
		}
  };
</script>

<style lang="scss">
.card
{
	text-align: center;
}
.card-title
{
	background: #536976;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #262831, #536976);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #262831, #536976); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	color:white;
	font-weight: 800;
	border-radius: 10px;
	font-size:larger;
}
.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
</style>