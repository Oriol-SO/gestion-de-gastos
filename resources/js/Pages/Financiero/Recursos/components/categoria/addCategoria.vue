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
            text="Agregar"
            color="warning"
            v-bind="activatorProps"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-2">
                <v-toolbar-title >Agregar nueva categoria</v-toolbar-title>
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
                        <v-col cols="12" >
                            <v-text-field
                            label="Nombre de la categoria"
                            variant="outlined"
                            required
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
    name:'addCategoria',
    data(){
        return{
            dialog:false,
            loader:false,
            form: new Form({
                nombre:''
            }),
        }
    },methods:{
        /**
         * funcion para enviar los datos del formulario categoria al servidor
         */
        agregar(){
            this.loader=true;
            this.form.post('/api/add-new-categoria').then(response=>{
                //REFRESCAMOS la carga de categorias
                const rsc=ResourceStore();
                rsc.fetchCategorias(true);
                //limpiamos el form
                this.form.reset();
                this.dialog=false;
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loader=false;
            })
        }
    }
}
</script>