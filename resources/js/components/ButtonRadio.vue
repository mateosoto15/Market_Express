<template>
    <b-form-radio  name="answers" :value="answer.id">{{ answer }}</b-form-radio>
</template>

<script>
    export default {
        props: ['name', 'value', 'answer'],
        
    }
</script>
