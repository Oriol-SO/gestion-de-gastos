<template>
    <div>
        <Navigation :items="routes"/>
        <router-view></router-view>
    </div>
</template>
<script>
import Navigation from '../../components/Navigation.vue';
export default{
    name:'indexadmin',
    components:{
        Navigation
    },
    data(){
        return{
            routes:[
                { text: 'Inicio', icon: 'mdi-home', link:'inicio.admin' },
                { text: 'Users', icon: 'mdi-account', link:'users.admin'},
                /*{ text: 'registros', icon: 'mdi-star', link:'inicio.financiero' },
                { text: 'recursos', icon: 'mdi-history',
                    group:true,
                    children:[
                        { text: 'Inicio', icon: 'mdi-home',link:'user.admin' },
                        { text: 'Users', icon: 'mdi-account',link:'user.admin' },
                    ] 
                }*/
            ],
        }
    }
}
</script>