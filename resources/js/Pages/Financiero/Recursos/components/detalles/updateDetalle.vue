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
            @click="fetchInsumos"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-2">
                <v-toolbar-title >Editar detalle</v-toolbar-title>
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
                            :items="insumos"
                            item-title="nombre"
                            item-value="id"
                            label="Seleccione el insumo"
                            v-model="form.insumo"
                            required
                            hide-details
                            variant="outlined"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" >
                            <v-text-field
                            label="Nombre del detalle"
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
    name:'updateDetalle',
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
                insumo:this.item.insumo_id,
                id:this.item.id
            }),
        }
    },
    computed:{
        insumos(){
            const rsc=ResourceStore();
            return rsc.getInsumos.filter((item)=>item.estado );
        }
    },
    methods:{
        /**
         * funcion para enviar los datos del formulario de detalle al servidor
         */
         update(){
            this.loader=true;
            this.form.id=this.item.id;

            this.form.post('/api/update-detalle').then(response=>{
                //REFRESCAMOS la carga de la lista de detalles de detalles
                const rsc=ResourceStore();
                rsc.fetchDetalles(true);
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
         fetchInsumos(){
            const rsc=ResourceStore();
            rsc.fetchInsumos();
         },
    }
}
</script>