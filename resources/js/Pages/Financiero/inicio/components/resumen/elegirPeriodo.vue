<template>
    <v-menu
    v-model="menu"
    max-width="400"
    :close-on-content-click="false"
    >  
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            v-bind="activatorProps"
            color="primary"
            text="Elegir periodo"
            variant="text"
            class="text-capitalize"
            size="small"
            ></v-btn>
        </template>
        <v-card
        title="Elegir periodo"
        >   
            <v-card-text >
                <v-form @submit.prevent="enviar">
                    <v-select
                    :items="tipos"
                    item-title="name"
                    item-value="id"
                    label="tipo"
                    variant="outlined"
                    v-model="form.tipo"
                    density="compact"
                    hide-details
                    ></v-select>
                    <br>
                    <v-text-field
                    v-if="form.tipo==1"
                    v-model="form.mes"
                    type="month"
                    label="periodo"
                    variant="outlined"
                    density="compact"
                    hide-details
                    ></v-text-field>
                    <v-text-field
                    v-if="form.tipo==2"
                    v-model="form.year"
                    type="number"
                    label="periodo"
                    variant="outlined"
                    density="compact"
                    min="1900" 
                    max="2100"
                    hide-details
                    ></v-text-field>
                    <div v-if="form.tipo==3">
                        <v-text-field
                        v-model="form.fecha1"
                        type="date"
                        label="Inicio"
                        variant="outlined"
                        density="compact"
                        hide-details
                        class="my-2"
                        ></v-text-field>
                        <v-text-field
                        v-model="form.fecha2"
                        type="date"
                        label="fin"
                        variant="outlined"
                        density="compact"
                        hide-details
                        class="my-2"
                        ></v-text-field>
                    </div>

                    <v-btn
                    color="primary"
                    type="submit"
                    size="small"
                    class="mt-2"
                    :disable="loader"
                    >
                        enviar
                    </v-btn>
                </v-form>
      
            </v-card-text>
        </v-card>
    </v-menu>
</template>
<script>
import { dashboardStore } from '../../../../../store/modules/dashboard';

export default{
    name:'elegirPeriodo',
    data(){
        return{
            menu:false,
            tipos:[
                {id:1 ,name:'Mes'},
                {id:2 ,name:'Año'},
                {id:3 ,name:'Personalizado'},
            ],
            form:{
                tipo:null,
                mes:null,
                year:null,
                fecha1:null,
                fecha2:null,
            }

        }
    },computed:{
        dash(){
            return dashboardStore();
        },
        loader(){
            this.dash.getLoader
        }
    },
    created(){
        this.form.tipo = this.dash.form.tipo;
        this.form.mes = this.dash.form.mes;
        this.form.year = this.dash.form.year;

    },
    methods:{
        enviar(){

            this.dash.form.tipo = this.form.tipo;
            this.dash.form.mes = this.form.mes;
            this.dash.form.year = this.form.year;
            this.dash.form.fecha1=this.form.fecha1;
            this.dash.form.fecha2=this.form.fecha2;
            this.dash.fetchResumenFinanciero();
        },
    },
}
</script>