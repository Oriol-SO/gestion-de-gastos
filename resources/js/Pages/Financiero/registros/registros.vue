<template>
    <div>
        <v-card class="ma-3" elevation="0" color="transparent">
            <v-card
            elevation="0"
            >
                <template v-slot:title>
                    <span class=" text-h4 font-weight-bold">Control financiero</span>
                </template>
                <template v-slot:subtitle>
                    <span class="text-warning">Gestion de registros </span>
                </template>
                <template v-slot:append>
                    <addRegistro/>
                </template>
                
            </v-card>
            <v-card-text class="py-0 pt-3">
                <Filtros/>
            </v-card-text>
            <v-card-text class="">
                <Tabla/>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
import Filtros from './components/filtros.vue';
import Tabla from './components/Tabla.vue';
import addRegistro from './components/addRegistro.vue';
export default {
    name:'Registros',
    components:{
        Tabla,
        addRegistro,
        Filtros
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