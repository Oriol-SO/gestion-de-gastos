<template>
    <v-dialog
    v-model="dialog"
    transition="dialog-bottom-transition"
    max-width="700"
    persistent
    >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            prepend-icon="mdi-plus"
            icon="mdi-pencil"
            color="warning"
            variant="text"
            v-bind="activatorProps"
            size="small"
            @click="fetchGenericas"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-2">
                <v-toolbar-title >Editar insumo</v-toolbar-title>
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
                <form action="" @submit.prevent="update()" class="mt-4">
                    <v-row>
                        <v-col cols="12">
                            <v-autocomplete
                            :items="genericas"
                            item-title="nombre"
                            item-value="id"
                            label="Seleccione la generica de gasto"
                            v-model="form.generica"
                            required
                            hide-details
                            variant="outlined"
                            ></v-autocomplete>
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
    name:'updateGenerica',
    props:{
        item:{default:null},
    },
    data(){
        return{
            dialog:false,
            loader:false,
            form: new Form({
                nombre:this.item.nombre,
                estado:this.item.estado,
                generica:this.item.generica_id,
                id:this.item.id
            }),
        }
    },
    computed:{
        genericas(){
            const rsc=ResourceStore();
            return rsc.getGenericas.filter((item)=>item.estado );
        }
    },
    methods:{
        /**
         * funcion para enviar los datos del formulario de insumos al servidor
         */
         update(){
            this.loader=true;
            this.form.id=this.item.id;

            this.form.post('/api/update-insumo').then(response=>{
                //REFRESCAMOS la carga de la lista de insumoc
                const rsc=ResourceStore();
                rsc.fetchInsumos(true);
                //cerramos el dialog
                this.dialog=false;
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loader=false;
            })
        },

        /**
         * Si todavia no se ha cargado las genericas ejecutamos la fucion en el store sin forzar la carga
         */
         fetchGenericas(){
            const rsc=ResourceStore();
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