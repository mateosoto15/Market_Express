
<template>
	<div class="row">
		<div v-for="(team,index) in teams" ref="" >
			<team-box :index="index" :title="team.name" :users="team.users" />
		</div>
	</div>
</template>

<script>
  export default {
	props: ['teams'],
  };
</script>