<template>
    <v-card>
        <v-card-title>
            Gestionar clasificaciones
        </v-card-title>
        <v-card-title>
            <v-text-field
            label="Buscar"
            v-model="search"
            hide-details
            density="compact"
            ></v-text-field>
        </v-card-title>
        <v-card-text>
            <v-data-table 
            :items="items" 
            :search="search"
            :headers="headers"
            >
                <template v-slot:item.estado="{ item }">
                   <v-switch
                   v-model="item.estado"
                   hide-details
                    density="compact"
                   color="primary"
                   ></v-switch>
                </template>
            </v-data-table>
        </v-card-text>
    </v-card>
</template>
<script>
import { ResourceStore } from '../../../store/modules/resource';

export default{
    name:'Categorias',
    data(){
        return{
            search:'',

            headers:[
                { title: 'id', key: 'id' },
                { title: 'categoria',key:'categoria'},
                { title: 'nombre', key: 'nombre' },
                
                { title: 'estado', key: 'estado' },

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