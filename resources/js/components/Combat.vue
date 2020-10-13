
<template>
    
	<div class="">
		<button class="add btn btn-primary" type="button" @click="combat">Combat</button>
	</div>
</template>

<script>
    export default {
        props: ['user', 'combat_id'],
        methods: {
            combat() {
                this.$emit('combat',{
                    user_id: this.user,
                    combat_id: this.combat_id
                });
            },
        }    
    }
</script>