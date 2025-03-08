<template>
    <v-app>
        <Headerdefault />
        <v-main class="ma-0 background-main" >
            <router-view v-slot="{ Component }">
                <transition name="fade" mode="out-in">
                    <component :is="Component" />
                </transition>
            </router-view>
        </v-main>
    </v-app>
</template> 
<script>
import Headerdefault from '../components/Headerdefault.vue';
export default {
    name: 'defaultLayout',
    components:{
        Headerdefault,
    }
}
</script>
<style scoped>
.background-main{
    background-color: #f6f6f6;
}
</style>