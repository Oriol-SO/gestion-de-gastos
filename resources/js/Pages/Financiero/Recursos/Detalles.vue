<template>
    <v-card class="ma-3" elevation="0">
        <template v-slot:title>
            <span class=" text-h4 font-weight-bold">Detalles de los insumos</span>
        </template>
        <template v-slot:subtitle>
            <span class="text-warning">Gestión de los detalles</span>
        </template>
    </v-card>
    <v-card class="ma-3" elevation="2">
        <v-card-title class="d-flex align-middle justify-center">
            <v-text-field
            label="Buscar"
            v-model="search"
            hide-details
            density="compact"
            variant="outlined"
            class="ma-3 my-auto"
            ></v-text-field>
            <AddDetalle/>
        </v-card-title>
        <v-card-text>
            <v-data-table 
            :items="items" 
            :search="search"
            :headers="headers"
            :group-by="groupBy"
            >
                <template v-slot:item.estado="{ item }">
                   <DisableDetalle :item="item"/>
                </template>
                <template v-slot:item.actions="{ item }">
                   <UpdateDetalle :item="item"/>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>
<script>
import { ResourceStore } from '../../../store/modules/resource';
import AddDetalle from './components/detalles/addDetalle.vue';
import DisableDetalle from './components/detalles/disableDetalle.vue';
import UpdateDetalle from './components/detalles/updateDetalle.vue';

export default{
    name:'Detalles',
    components:{
        AddDetalle,
        UpdateDetalle,
        DisableDetalle
    },
    data(){
        return{
            search:'',
            groupBy:[{key:'insumo',order:'asc'}],
            headers:[
                { title: 'id', key: 'id' },
                { title:'Insumo' ,key:'insumo'},
                { title: 'nombre', key: 'nombre' },
                { title: 'estado', key: 'estado' },
                { title: '', key: 'actions' },
            ]
        }
    },computed:{
        items(){
            const rsc=ResourceStore();
            return rsc.getDetalles
        }   
    },mounted(){
        const rsc=ResourceStore()
        rsc.fetchDetalles();
    }
}
</script>