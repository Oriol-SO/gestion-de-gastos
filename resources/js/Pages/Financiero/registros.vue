<template>ingles
    <div>
        <v-card class="ma-3" elevation="0" color="transparent">
            <v-card
            elevation="0"
            >
                <template v-slot:title>
                    <span class=" text-h4 font-weight-bold">Control Financiero</span>
                </template>
                <template v-slot:subtitle>
                    <span class="text-warning">Registros del control financiero</span>
                </template>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" sm="4">
                      
                            <v-card 
                            color="green"
                            variant="tonal"
                            >
                                <template v-slot:prepend>
                                <v-avatar color="green-darken-2" variant="tonal" size="50">
                                    <v-icon icon="mdi-finance" size="50"></v-icon>
                                </v-avatar>
                                </template>
                                <template v-slot:title>
                                    <span class=" text-h4 font-weight-bold">{{ this.info?.ingreso }} ./s</span>
                                </template>
                                <template v-slot:subtitle>
                                    <span>Ingresos</span>
                                </template>
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="4">
                            <v-card 
                            color="red"
                            variant="tonal"
                            >
                                <template v-slot:prepend>
                                <v-avatar color="red-darken-2" variant="tonal" size="50">
                                    <v-icon icon="mdi-cash-off" size="50"></v-icon>
                                </v-avatar>
                                </template>
                                <template v-slot:title>
                                    <span class=" text-h4 font-weight-bold">{{ this.info?.gasto }} ./s</span>
                                </template>
                                <template v-slot:subtitle>
                                    <span>Gastos</span>
                                </template>
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="4">
                            <v-card 
                            color="primary"
                            variant="tonal"
                            >
                                <template v-slot:prepend>
                                <v-avatar color="blue-darken-2" variant="tonal" size="50">
                                    <v-icon icon="mdi-cash-refund" size="50"></v-icon>
                                </v-avatar>
                                </template>
                                <template v-slot:title>
                                    <span class=" text-h4 font-weight-bold">{{ this.info?.utilidad }} ./s</span>
                                </template>
                                <template v-slot:subtitle>
                                    <span >Saldo</span>
                                </template>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
            
            <v-card-text class="mt-2">
                <Tabla/>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
import axios from 'axios';
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
        /**
         * Obtener las informacion degasots,ingresos y utilidades
         */
        fetchInfo(){
            axios.get('/api/get-info-financiero').then(response=>{
                this.info=response.data[0]
            }).catch(error=>{
                alert(error)
            })
        }
    },
    mounted(){
        this.fetchInfo();
    }
}

</script>