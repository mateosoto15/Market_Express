<template>
    <span v-if="content > 0" class="badge badge-pill badge-danger">
        {{ content }}
    </span>
</template>

<script>
    export default {
        props: ['content', 'unread', 'user_id'],
        created () {
            this.setcount();
        },
        methods: {
            setcount(){
                this.$emit('countset',{
                    count: this.unread,
                    user_id: this.user_id
                });
            }
        }
    }
</script>
