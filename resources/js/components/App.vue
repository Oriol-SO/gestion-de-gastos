<template>
    <transition name="page" mode="out-in">
        <component :is="currentLayout" />
    </transition>
</template>
<script>
import defaultLayout from '../layouts/default.vue';
import notlayout from '../layouts/notlayout.vue';
export default{
    name:'App',
    computed: {
        currentLayout(){
            if(this.$route.meta?.layout=='notlayout'){
                return notlayout
            }
            return defaultLayout;
        }
    }
}
</script>