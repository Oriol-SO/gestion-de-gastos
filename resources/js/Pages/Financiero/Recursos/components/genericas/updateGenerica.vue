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
            @click="fetchCategorias"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-2">
                <v-toolbar-title >Editar esta Generica de gasto</v-toolbar-title>
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
                            <v-select
                            :items="categorias"
                            item-title="nombre"
                            item-value="id"
                            label="Seleccione la categoria"
                            v-model="form.categoria"
                            required
                            variant="outlined"
                            ></v-select>
                        </v-col>
                        <v-col cols="12" >
                            <v-text-field
                            label="Nombre de la categoria"
                            variant="outlined"
                            required
                            v-model="form.nombre"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-switch
                            label="Habilitar lista para compras"
                            color="purple"
                            hide-details
                            density="compact"
                            v-model="form.compras"
                            ></v-switch>
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
                categoria:this.item.categoria_id,
                compras:this.item.compras,
                id:this.item.id
            }),
        }
    },
    computed:{
        categorias(){
            const rsc=ResourceStore();
            return rsc.getCategorias.filter((item)=>(item.estado));
        }
    },
    methods:{
        /**
         * funcion para enviar los datos del formulario categoria al servidor
         */
         update(){
            this.loader=true;
            this.form.id=this.item.id;

            this.form.post('/api/update-generica').then(response=>{
                //REFRESCAMOS la carga de la lista de genericas de gasto
                const rsc=ResourceStore();
                rsc.fetchGenericas(true);
                //cerramos el dialog
                this.dialog=false;
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loader=false;
            })
        },

        
        /**
         * Si todavia no se ha cargado las categorias ejecutamos la fucion en el store sin forzar la carga
         */
         fetchCategorias(){
            const rsc=ResourceStore();
            rsc.fetchCategorias();
         }
    }
}
</script>