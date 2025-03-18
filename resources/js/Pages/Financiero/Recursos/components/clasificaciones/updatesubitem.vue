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
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-2">
                <v-toolbar-title >Editar este item de compra</v-toolbar-title>
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
                        <v-col cols="12" >
                            <v-text-field
                            label="Nombre del item"
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
                        >Actualizar</v-btn>
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
    name:'updateSubItem',
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
                id:this.item.id
            }),
        }
    },methods:{
        /**
         * funcion para enviar los datos del formulario al servidor
         */
         update(){
            this.loader=true;
            this.form.id=this.item.id;

            this.form.post('/api/update-item-compra').then(response=>{
                //REFRESCAMOS la carga de items de compra
                const rsc=ResourceStore();
                rsc.fetchSubItems(true);
                //limpiamos el form
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