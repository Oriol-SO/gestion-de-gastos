<template>
    <div>
        <v-card class="ma-3" elevation="0" color="transparent">
            <v-card
            elevation="0"
            >
                <template v-slot:title>
                    <span class=" text-h4 font-weight-bold">Control Financiero</span>
                </template>
                <template v-slot:subtitle>
                    <span class="text-warning">últimos 50 registros</span>
                </template>
            </v-card>
            
            <v-card-text class="mt-2">
                <Tabla/>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
import Tabla from './components/Tabla.vue';
export default {
    name:'Registros',
    components:{
        Tabla
    },
    data(){
        return{
            info:null,
        }
    },
    methods:{

    },
}

</script>