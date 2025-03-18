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
            @click="fetchInsumos_"
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
                            <v-autocomplete
                            :items="genericas"
                            item-title="nombre"
                            item-value="id"
                            label="Seleccione la generica"
                            v-model="form.generica"
                            required
                            hide-details
                            variant="outlined"
                            @update:modelValue="clearInsumo"
                            ></v-autocomplete>
                        </v-col>
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
/**
 * componente para agregar un nuevo detalle del insumo
 */
import Form from 'vform'
import { ResourceStore } from '../../../../../store/modules/resource';
export default{
    name:'addDetalle',
    data(){
        return{
            dialog:false,
            loader:false,
            form: new Form({
                generica:'',
                insumo:'',
                nombre:''
            }),
        }
    },
    computed:{
        insumos(){
            const rsc=ResourceStore();
            return rsc.getInsumos.filter((item)=>(item.estado && item.generica_id==this.form.generica));
        },
        genericas(){
            const rsc=ResourceStore();
            return rsc.getGenericas.filter((item)=>(item.estado));
        }
    },
    methods:{
        /**
         * funcion para enviar los datos del formulario de detalle de gasto al servidor
         */
        agregar(){
            this.loader=true;
            this.form.post('/api/add-new-detalle').then(response=>{
                //REFRESCAMOS la carga de insumos
                const rsc=ResourceStore();
                rsc.fetchDetalles(true);
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
         * Si todavia no se ha cargado los insumos se vuelve a llamar el store
         */
         fetchInsumos_(){
            const rsc=ResourceStore();
            rsc.fetchInsumos();
            rsc.fetchGenericas();
         },

        /**
         * funcion para limpiar el valor de  form.insumo
         */
        clearInsumo(){
            this.form.insumo='';
         }
    }
}
</script>