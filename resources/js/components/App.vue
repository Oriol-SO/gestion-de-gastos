<template>
    <transition name="page" mode="out-in">
        <component :is="currentLayout" />
    </transition>
</template>
<script>
import defaultLayout from '../layouts/default.vue';
export default{
    name:'App',
    computed: {
        currentLayout(){
            return defaultLayout;
        }
    }
}
</script>