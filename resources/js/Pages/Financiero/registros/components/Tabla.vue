
<template>

    <v-card 
    class="pa-0 ma-0" 
    elevation="2" 
    :subtitle="title"
    >
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
        </v-card-title>

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

    </v-card>


</template>
<script>
import EditRegistro from './EditRegistro.vue';
import { RegistroStore } from '../../../../store/modules/registro';
export default {
    name: 'Tabla',
    components:{
        EditRegistro
    },
    data () {
        return {
            //loading:true,
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
                { title: 'Compra', key: 'compra' },
                { title: 'Generica', key: 'generica' },

                { title: 'Detalle', key: 'detalle' },
                { title: 'Insumo', key: 'insumo' },

                { title: 'gto', key: 'gasto' },
                { title: 'ing', key: 'ingreso' },
                { title: 'tx', key: 'transaccion' },
                { title: 'cnt', key: 'tipo_cuenta' },
                { title: 'com', key: 'comprobante' },

                { title: '' , key:'actions'},
            ],
            //registros:[],
        }
    },
    computed:{
        registros(){
            const reg=RegistroStore();
            return reg.getRegistros
        },
        loading(){
            const reg=RegistroStore();
            return reg.getLoader
        },
        title(){
            const reg=RegistroStore();
            return reg.getTitle
        }
    },  
    methods: {
        fetch_registros(){
           const reg=RegistroStore();
            reg.fetchRegistros();
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