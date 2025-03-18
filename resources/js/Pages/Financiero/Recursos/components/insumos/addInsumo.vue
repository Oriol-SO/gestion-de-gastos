<template>
    <v-dialog
    v-model="dialog"
    transition="dialog-bottom-transition"
    max-width="800"
    persistent
    >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            prepend-icon="mdi-plus"
            text="Agregar"
            color="warning"
            v-bind="activatorProps"
            @click="fetchCategorias"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-2">
                <v-toolbar-title >Agregar nuevo Insumo</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn
                    text="Cerrar"
                    variant="text"
                    @click="dialog = false"
                    ></v-btn>
                </v-toolbar-items>
            </v-toolbar>
            <v-card-text>
                <form action="" @submit.prevent="agregar()" class="mt-4">
                    <v-row>
                        <v-col cols="12">
                            <v-select
                            :items="categorias"
                            item-title="nombre"
                            item-value="id"
                            label="Seleccione la categoria"
                            v-model="form.categoria"
                            required
                            hide-details
                            @update:modelValue="clearGenerica"
                            variant="outlined"
                            ></v-select>
                        </v-col>
                        <v-col cols="12">
                            <v-select
                            :items="genericas"
                            item-title="nombre"
                            item-value="id"
                            label="Seleccione la generica de gasto"
                            v-model="form.generica"
                            required
                            hide-details
                            variant="outlined"
                            ></v-select>
                        </v-col>
                        <v-col cols="12" >
                            <v-text-field
                            label="Nombre del isumo"
                            variant="outlined"
                            required
                            hide-details
                            v-model="form.nombre"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-btn
                        color="warning"
                        type="submit"
                        :loading="loader"
                        >Enviar</v-btn>
                    </v-row>
                </form>

            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script>

import Form from 'vform'
import { ResourceStore } from '../../../../../store/modules/resource';
export default{
    name:'addInsumo',
    data(){
        return{
            dialog:false,
            loader:false,
            form: new Form({
                categoria:'',
                generica:'',
                nombre:''
            }),
        }
    },
    computed:{
        categorias(){
            const rsc=ResourceStore();
            return rsc.getCategorias.filter((item)=>(item.estado));
        },
        genericas(){
            const rsc=ResourceStore();
            return rsc.getGenericas.filter((item)=>(item.estado && item.categoria_id==this.form.categoria));
        }
    },
    methods:{
        /**
         * funcion para enviar los datos del formulario de insumo de gasto al servidor
         */
        agregar(){
            this.loader=true;
            this.form.post('/api/add-new-insumo').then(response=>{
                //REFRESCAMOS la carga de insumos
                const rsc=ResourceStore();
                rsc.fetchInsumos(true);
                //limpiamos el form
                this.form.reset();
                this.dialog=false;
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loader=false;
            })
        },

        /**
         * Si todavia no se ha cargado las categorias ejecutamos la fucion en el store sin forzar la carga
         * de la misma forma se cargan la lista de genericas
         */
         fetchCategorias(){
            const rsc=ResourceStore();
            rsc.fetchCategorias();
            rsc.fetchGenericas();
         },

         /**
          * funcion para limpiar el valor de  form.generica
          */
         clearGenerica(){
            this.form.generica='';
         }
    }
}
</script>