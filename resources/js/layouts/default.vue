<template>
    <v-app>
        <v-main class="ma-0">
            <Header/>
            <router-view v-slot="{ Component }">
                <transition name="fade" mode="out-in">
                    <component :is="Component" />
                </transition>
            </router-view>
        </v-main>
    </v-app>
</template> 
<script>
import Header from '../components/header.vue';
export default {
    name: 'defaultLayout',
    components:{
        Header
    }
}
</script>