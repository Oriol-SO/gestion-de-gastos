<template>
    <v-card
    subtitle="Filtros"
    >
        <v-card-text>
            <v-form @submit.prevent="filtrar()">
                <v-row class="align-center">
                    <v-col cols="12" sm="3">
                        <v-select 
                        label="Categoria"
                        density="compact"
                        hide-details
                        variant="outlined"
                        :items="categorias"
                        item-value="id"
                        item-title="nombre"
                        v-model="form.categoria"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" sm="4" class="d-flex px-2">
                            <v-text-field
                            v-model="form.fecha1"
                            label="inicio"
                            type="date"
                            density="compact"
                            hide-details
                            variant="outlined"
                            ></v-text-field>
                            <v-text-field
                            v-if="form.fecha1"
                            class="mx-2"
                            v-model="form.fecha2"
                            label="fin"
                            type="date"
                            density="compact"
                            hide-details
                            variant="outlined"
                            ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="2">
                        <v-select 
                        label="Tipo"
                        density="compact"
                        hide-details
                        variant="outlined"
                        :items="tipos"
                        item-value="id"
                        item-title="name"
                        v-model="form.tipo"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" sm="3" >
                        <v-btn
                        color="primary"
                        type="submmit"
                        append-icon="mdi-magnify"
                        class="text-capitalize"
                        >
                        filtrar
                        </v-btn>
                        <v-btn
                        color="purple"
                        append-icon="mdi-restore"
                        class="ml-2 text-capitalize"
                        @click="resetear()"
                        :disabled="loader"
                        :loading="loader"
                        >
                        Resetear
                        </v-btn>
                    </v-col>
                </v-row>
            </v-form>
        </v-card-text>
    </v-card>
</template>
<script>
import { Form } from 'vform';
import { ResourceStore } from '../../../../store/modules/resource';
import { RegistroStore } from '../../../../store/modules/registro';
export default{
    name:'filtros',

    data(){
        return{
            form: new Form({
                fecha1:null,
                fecha2:null,
                categoria:null,
                tipo:null,
            }),
            tipos:[
                {id:1,name:'Ingreso'},
                {id:2,name:'Gasto'},
            ]
        }
    },
    computed:{
        categorias(){
            const rsc=ResourceStore();
            return rsc.getCategorias;
        },
        loader(){
            const rsc=RegistroStore();
            return rsc.getLoader
        }
    },
    methods:{
        filtrar(){
            
            if(!this.form.fechas && !this.form.categoria && !this.form.tipo){
                alert('rellena al menos un campo')
                return;
            }
            const reg=RegistroStore();
            reg.updateLoad(true);
            this.form.post('/api/get-registros-filtro').then(response=>{
                //actualizamos el store
                reg.updateRegistros(response.data);
                this.changeTitle();
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                reg.updateLoad(false);
            })
        },
        fetch(){
            const rsc=ResourceStore();
            rsc.fetchCategorias()
        },
        /**
         * funcion para cambiar el titulo de la tabla e base a los filtros
         */
        changeTitle(){
            let title="";
            if(this.form.categoria){
                title="Registros segun categoria";
            }
            if(this.form.fecha){
                title="Registros por fecha";
            }
            if(this.form.tipo){
                title="Registros por tipo";
            }

            const reg=RegistroStore();
            reg.updateTitle(title);
        },
        /**
         * borramos el formulario y reseteamos a los registros ultimos
         */
        resetear(){
            const reg=RegistroStore();
            reg.fetchRegistros(true);
            this.form.reset()
        }
    },
    created(){
        this.fetch()
    }
}
</script>