// resources/assets/js/components/ChatForm.vue

<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="body" class="form-control input-sm" placeholder="Escribe tu mensaje aquí..." v-model="newMessage" @keyup.enter="sendMessage">

        <span class="input-group-btn">
            <button class="btn btn-primary" id="btn-chat" @click="sendMessage"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user_from','user_to'],

        data() {
            return {
                newMessage: ''
            }
        },
        created() {
            this.setUsers();
        },
        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user_id: this.user_from.id,
                    user_to: this.user_to.id,
                    participation: {
                        messageable_id: this.user_from.id
                    },
                    body: this.newMessage
                });

                this.newMessage = ''
            },

            setUsers(){
                this.$emit('usersent',{
                    user_from: this.user_from.id,
                    user_to: this.user_to.id,
                });
            }
        }    
    }
</script>