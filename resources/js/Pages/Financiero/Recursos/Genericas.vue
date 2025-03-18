<template>
    <v-card class="ma-3" elevation="0">
        <template v-slot:title>
            <span class=" text-h4 font-weight-bold">Genericas de gasto</span>
        </template>
        <template v-slot:subtitle>
            <span class="text-warning">Gestión de las genericas de gasto</span>
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
            <AddGenerica/>
        </v-card-title>
        <v-card-text>
            <v-data-table 
            :items="items" 
            :search="search"
            :headers="headers"
            :group-by="groupBy"
            >
                <template v-slot:item.estado="{ item }">
                   <DisableGenerica :item="item"/>
                </template>
                <template v-slot:item.actions="{ item }">
                    <UpdateGenerica :item="item"/>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>
<script>
import { ResourceStore } from '../../../store/modules/resource';
import AddGenerica from './components/genericas/addGenerica.vue';
import DisableGenerica from './components/genericas/disableGenerica.vue';
import UpdateGenerica from './components/genericas/updateGenerica.vue';

export default{
    name:'Genericas',
    components:{
        AddGenerica,
        UpdateGenerica,
        DisableGenerica
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
                { title:'', key:'actions'},

            ]
        }
    },computed:{
        items(){
            const rsc=ResourceStore();
            return rsc.getGenericas
        }   
    },mounted(){
        const rsc=ResourceStore()
        rsc.fetchGenericas();
    }
}
</script>