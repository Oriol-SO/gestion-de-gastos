<template>
    <v-card class="ma-3" elevation="0">
        <template v-slot:title>
            <span class=" text-h4 font-weight-bold">Clasificaciones por categoría</span>
        </template>
        <template v-slot:subtitle>
            <span class="text-warning">Gestión de las clasificaciones</span>
        </template>
    </v-card>
    <v-card class="ma-3" elevation="3">
        <v-card-title class="d-flex align-middle justify-center">
            <v-text-field
            label="Buscar"
            v-model="search"
            hide-details
            density="compact"
            variant="outlined"
            class="ma-3 my-auto"
            ></v-text-field>
            <AddClasificacion/>
        </v-card-title>
        <v-card-text>
            <v-data-table 
            :items="items" 
            :search="search"
            :headers="headers"
            :group-by="groupBy"
            >
                <template v-slot:item.estado="{ item }">
                   <disableClasificacion :item="item"/>
                </template>
                <template v-slot:item.actions="{ item }">
                   <UpdateClasificacion :item="item"/>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>
<script>
import { ResourceStore } from '../../../store/modules/resource';
import AddClasificacion from './components/clasificaciones/addClasificacion.vue';
import disableClasificacion from './components/clasificaciones/disableClasificacion.vue';
import UpdateClasificacion from './components/clasificaciones/updateClasificacion.vue';
export default{
    name:'Categorias',
    components:{
        AddClasificacion,
        disableClasificacion,
        UpdateClasificacion
    },
    data(){
        return{
            search:'',
            groupBy:[{key:'categoria',order:'asc'}],
            headers:[
                { title: 'id', key: 'id' },
                { title: 'categoria',key:'categoria'},
                { title: 'nombre', key: 'nombre' },
                { title: 'estado', key: 'estado' },
                { title: '', key: 'actions'}

            ]
        }
    },computed:{
        items(){
            const rsc=ResourceStore();
            return rsc.getClasificaciones
        }   
    },mounted(){
        const rsc=ResourceStore()
        rsc.fetchClasificaciones();
    }
}
</script>