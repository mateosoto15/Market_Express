<template>
    <transition name="roll" appear>
        <img class="vs"  src="/images/medium/vs.png" alt="">
    </transition>
</template>

<script>
export default {
    
}
</script>

<style lang="scss">
.roll-enter-active
{
    animation: roll-in 1s;

}
.roll-leave-active
{
    animation: roll-in 1s reverse;
    opacity: 0;

}
@keyframes roll-in {
    0%{
        transform: scale(0) rotateY(0deg) translateX(-250px);
        opacity: 0;
    }
    75%{
        opacity: 1;
    }
    100%{
        transform: scale(1) rotateY(360deg) translateX(0px);
        opacity: 0;
    }
}
</style>