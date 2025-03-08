<template>
    <div>
        <Navigation :items="routes"/>
        <router-view></router-view>
    </div>
</template>
<script>
import Navigation from '../../components/Navigation.vue';
export default{
    name:'indexfinanciero',
    components:{
        Navigation
    },
    data(){
        return{
            routes:[
                { text: 'Inicio', icon: 'mdi-home', link:'inicio.financiero' },
                { text: 'recursos', icon: 'mdi-view-dashboard',
                    group:true,
                    children:[
                        { text: 'Categorias', icon: 'mdi-table',link:'categorias' },
                        { text: 'clasificaciones', icon: 'mdi-table',link:'clasificaciones' },
                        { text: 'Genericas', icon: 'mdi-table',link:'genericas' },
                        { text: 'Insumos', icon: 'mdi-table',link:'insumos' },
                        { text: 'Detalles', icon: 'mdi-table',link:'detalles' },
                       // { text: 'Cuentas', icon: 'mdi-table',link:'tipocuentas' },
                        //{ text: 'Comprobantes', icon: 'mdi-table',link:'comprobantes' },
                    ] 
                }
            ],
        }
    }
}
</script>