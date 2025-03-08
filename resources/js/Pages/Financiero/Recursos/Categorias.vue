<template>
    <v-card class="ma-3" elevation="0">
        <template v-slot:title>
            <span class=" text-h4 font-weight-bold">Categorías</span>
        </template>
        <template v-slot:subtitle>
            <span class="text-warning">Gestión de las categorias</span>
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
            <addCategoria/>
        </v-card-title>
        <v-card-text>
            <v-data-table 
            :items="items" 
            :search="search"
            :headers="headers"
            >
                <template v-slot:item.estado="{ item }">
                   <disableCategoria :item="item"/>
                </template>
                <template v-slot:item.actions="{ item }">
                   <updateCategoria :item="item"/>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>
<script>
import { ResourceStore } from '../../../store/modules/resource';
import addCategoria from './components/categoria/addCategoria.vue';
import disableCategoria from './components/categoria/disableCategoria.vue';
import updateCategoria from './components/categoria/updateCategoria.vue';
export default{
    name:'Categorias',
    components:{
        addCategoria,
        disableCategoria,
        updateCategoria
    },
    data(){
        return{
            search:'',
            headers:[
                { title: 'id', key: 'id' },
                { title: 'nombre', key: 'nombre' },
                { title: 'estado', key: 'estado' },
                { title: '', key: 'actions'}
                
            ]
        }
    },computed:{
        items(){
            const rsc=ResourceStore();
            return rsc.getCategorias
        }   
    },mounted(){
        const rsc=ResourceStore()
        rsc.fetchCategorias();
    }
}
</script>