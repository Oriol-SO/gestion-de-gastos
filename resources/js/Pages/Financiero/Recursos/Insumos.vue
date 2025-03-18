<template>
    <v-card class="ma-3" elevation="0">
        <template v-slot:title>
            <span class=" text-h4 font-weight-bold">Insumos de las genericas de gasto</span>
        </template>
        <template v-slot:subtitle>
            <span class="text-warning">Gestión de las insumos</span>
        </template>
    </v-card>
    <v-card class="ma-3" elevation="0">
        <v-card-title class="d-flex align-middle justify-center">
            <v-text-field
            label="Buscar"
            v-model="search"
            hide-details
            density="compact"
            variant="outlined"
            class="ma-3 my-auto"
            ></v-text-field>
            <AddInsumo/>
        </v-card-title>
        <v-card-text>
            <v-data-table 
            :items="items" 
            :search="search"
            :headers="headers"
            :group-by="groupBy"
            >
                <template v-slot:item.estado="{ item }">
                    <DisableInsumo :item="item" />
                </template>
                <template v-slot:item.actions="{ item }">
                    <UpdateInsumo :item="item"/>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>
<script>
import { ResourceStore } from '../../../store/modules/resource';
import AddInsumo from './components/insumos/addInsumo.vue';
import DisableInsumo from './components/insumos/disableInsumo.vue';
import UpdateInsumo from './components/insumos/updateInsumo.vue';

export default{
    name:'Insumos',
    components:{
        AddInsumo,
        UpdateInsumo,
        DisableInsumo
    },
    data(){
        return{
            search:'',
            groupBy:[{key:'generica',order:'asc'}],
            headers:[
                { title: 'id', key: 'id' },
                { title:'Generica' ,key:'generica'},
                { title: 'nombre', key: 'nombre' },
                { title: 'estado', key: 'estado' },
                {title: '',key:'actions'}

            ]
        }
    },computed:{
        items(){
            const rsc=ResourceStore();
            return rsc.getInsumos
        }   
    },mounted(){
        const rsc=ResourceStore()
        rsc.fetchInsumos();
    }
}
</script>