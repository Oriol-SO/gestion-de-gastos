
<template>

    <v-card class="pa-0 ma-0" elevation="0">
        <v-card-title class="d-flex align-middle justify-center">
            <v-text-field
            class="ma-2 my-auto"
            density="compact"
            hide-details
            variant="outlined"
            label="Buscar"
            outlined
            color="warning"
            v-model="search"
            ></v-text-field>
            <addRegistro @refresh="fetch_registros(false)" />
        </v-card-title>
    
    </v-card>

    <div class="text-center my-3">
        <v-btn
        :disabled="loading"
        append-icon="mdi-refresh"
        text="Actualizar"
        variant="outlined"
        @click="fetch_registros(true)"
        ></v-btn>
    </div>

    <v-data-table 
    :items="registros" 
    :loading="loading"
    :search="search"
    :headers="headers"
    >
        <template v-slot:header.fecha="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.descripcion="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.ordenes="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.categoria="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.proveedor="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.empresa="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.clasificacion="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>
        <template v-slot:header.generica="{ column }">
            <strong>{{ column.title.toUpperCase() }}</strong>
        </template>

        <template v-slot:loading>
            <v-skeleton-loader type="table-row@10"></v-skeleton-loader>
        </template>
        <template v-slot:item.actions="{ item }">
            <EditRegistro :item="item" @refresh="fetch_registros(false)"/>
        </template>
    </v-data-table>

</template>
<script>

import addRegistro from './addRegistro.vue';
import axios from 'axios'
import EditRegistro from './EditRegistro.vue';
export default {
    name: 'Tabla',
    components:{
        addRegistro,
        EditRegistro
    },
    data () {
        return {
            loading:true,
            search:'',
            headers: [
                {
                    title: 'Fecha',
                    align: 'center',
                    key: 'fecha',
                },
                { title: 'Descripcion', key: 'descripcion' },
                { title: 'Ordenes', key: 'ordenes' },
                { title: 'Proveedor', key: 'proveedor' },
                { title: 'Empresa', key: 'empresa' },
                { title: 'Categoria', key: 'categoria' },
                { title: 'Clasificación', key: 'clasificacion' },
                { title: 'Generica', key: 'generica' },
                { title: '' , key:'actions'},
            ],
            registros:[],
        }
    },
    computed:{

    },  
    methods: {
        fetch_registros( load=false){
            this.loading=load;
            axios.get('/api/registros').then(response=>{
                this.registros=response.data;
            }).catch(e=>{

            }).finally(()=>{
                this.loading=false
            })

        },
        editItem(item){

        },
        deleteItem(item){
            
        }

    },
    mounted(){
        this.fetch_registros(true);
    }
}
</script>