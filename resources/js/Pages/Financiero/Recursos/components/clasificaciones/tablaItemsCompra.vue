<template>
    <v-dialog
    v-model="dialog"
    transition="dialog-bottom-transition"
    fullscreen
    persistent
    >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            prepend-icon="mdi-store"
            text="Items de compra"
            class="text-capitalize"
            color="purple"
            v-bind="activatorProps"
            @click="fetchlistclasificaciones"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="purple-lighten-2">
                <v-toolbar-title >Items de compras para clasificaciones</v-toolbar-title>
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
                <v-card>
                    <v-card-title>
                        <strong>Clasificación: {{ item.nombre }}</strong>
                    </v-card-title>
                </v-card>
                <v-card class="mt-3">
                    <v-card-subtitle>
                        Agrega nuevos items
                    </v-card-subtitle>
                    <v-card-text>
                        <form action="" @submit.prevent="agregar()" class="mt-4">
                            <v-row>
                                <v-col cols="12" sm="5"  >
                                    <v-text-field
                                    label="nombre"
                                    required
                                    density="compact"
                                    variant="outlined"
                                    v-model="form.nombre"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="3">
                                    <v-btn
                                    color="purple"
                                    type="submit"
                                    class="text-capitalize"
                                    :loading="loader"
                                    >Agregar
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </form> 
                        <v-data-table 
                        :items="itemscompra" 
                        :headers="headers"
                        >
                            <template v-slot:item.estado="{ item }">
                                <Disablesubitem :item="item"/>
                            </template>
                            <template v-slot:item.actions="{ item }">
                                <Updatesubitem :item="item"/>
                            </template>
                        </v-data-table>
                        
                    </v-card-text>
                </v-card>


            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script>
/**
 * componente para visualizar los sub items de compra de una clasificacion
 */
import Form from 'vform'
import { ResourceStore } from '../../../../../store/modules/resource';
import Updatesubitem from './updatesubitem.vue';
import Disablesubitem from './disablesubitem.vue';
export default{
    name:'tableItemsCompra',
    props:{
        item:{default:null}
    },
    components:{
        Updatesubitem,
        Disablesubitem
    },
    data(){
        return{
            dialog:false,
            loader:false,
            form: new Form({
                clasificacion:'',
                nombre:''
            }),
            headers:[
               // { title: 'id', key: 'id' },
                { title: 'nombre', key: 'nombre' },
                
                { title: 'estado', key: 'estado' },
                { title:'', key:'actions'},

            ]
        }
    },
    computed:{
        clasificaciones(){
            const rsc=ResourceStore();
            return rsc.getClasificaciones.filter(item=>(item.estado && item.categoria_id==this.item.categoria_id))
        },
        itemscompra(){
            const rsc=ResourceStore();
            return rsc.getSubItems.filter(item=>(item.clasificacion_id==this.item.id))
        }
    },
    methods:{
        /**
         * funcion para enviar los datos del formulario de clasificacion compra al servidor
         */
        agregar(){
            this.loader=true;
            this.form.clasificacion=this.item.id;
            this.form.post('/api/add-new-item-compra').then(response=>{
                //REFRESCAMOS la carga de items de compra
                const rsc=ResourceStore();
                rsc.fetchSubItems(true);
                //limpiamos el form
                this.form.reset();
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loader=false;
            })
        },

        /**
         * funcion para obtener las clasificaciones desde el almacen 
         * obtiene la lista de items de compra de la categoria actual
         */
        fetchlistclasificaciones(){
            const rsc=ResourceStore()
            rsc.fetchClasificaciones();

            rsc.fetchSubItems();

        }
    }
}
</script>