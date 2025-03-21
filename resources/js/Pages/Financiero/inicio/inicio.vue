<template>
    <div>
        
        <v-card  class="ma-3" elevation="0" color="transparent"  >
            <v-card
            elevation="0"
            v-if="!loader"
            >
                <template v-slot:title>
                    <span class=" text-h4 font-weight-bold">{{ title }}</span> 
                    <ElegirPeriodo/>
                </template>
                <template v-slot:subtitle>
                    <span class="text-warning">Resumen financiero</span>
                </template>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" sm="3">
                      
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
                        <v-col cols="12" sm="3">
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
                        <v-col cols="12" sm="3">
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
                                    <span >Capital</span>
                                </template>
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="3">
                            <v-card 
                            color="purple"
                            variant="tonal"
                            >
                                <template v-slot:prepend>
                                <v-avatar color="purple-darken-2" variant="tonal" size="50">
                                    <v-icon icon="mdi-cash-refund" size="50"></v-icon>
                                </v-avatar>
                                </template>
                                <template v-slot:title>
                                    <span class=" text-h4 font-weight-bold">{{ this.info?.utilidad }} ./s</span>
                                </template>
                                <template v-slot:subtitle>
                                    <span >Utilidades</span>
                                </template>
                            </v-card>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12" md="12">
                            <Tendencias/>
                        </v-col>
                        <v-col cols="12" md="4">
                            <!--Graficotorta/-->
                        </v-col>
                       
                        <Tendecias2/>
                    </v-row>
                </v-card-text>
            </v-card>
            <Loaderinicio v-else/>
        </v-card>
       
    </div>
</template>
<script>
import Tendencias from './components/graficos/tendencias.vue';
import ElegirPeriodo from './components/resumen/elegirPeriodo.vue';
import { dashboardStore } from '../../../store/modules/dashboard';
import Loaderinicio from './components/loaderinicio.vue';
import Tendecias2 from './components/graficos/tendecias2.vue';
import Graficotorta from './components/graficos/graficotorta.vue';
export default {
    name:'inicio',
    components:{
        Tendencias,
        Tendecias2,
        Graficotorta,
        ElegirPeriodo,
        Loaderinicio
    },
    data(){
        return{

        }
    },
    computed:{
        info(){
            const dash=dashboardStore()
            return dash.getResumenFinanciero
        },

        title(){
            const dash=dashboardStore()
            return dash.getTitle
        },
        loader(){
            const dash=dashboardStore()
            return dash.getLoader
        }
  
    },
    methods:{
        /**
         * Obtener las informacion desde el store
         */
        fetchInfo(){
           const dash=dashboardStore()
           dash.fetchResumenFinanciero()
        },


    },
    mounted(){
        this.fetchInfo();
    }
}

</script>