<template>
    <v-card>
        <v-card-title>
            Gestion de Usuarios
        </v-card-title>
        <v-card class="pa-0 ma-0 mt-5" elevation="0">
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
        
        </v-card>
        <v-data-table 
        :items="users" 
        :loading="loading"
        :search="search"
        :headers="headers"
        >
        <template v-slot:item.estado="{ item }">
            <v-chip size="small" :color="item.estado?'green':'red'">{{ item.estado?'Activo':'Inactivo' }}</v-chip>
        </template>
        <template v-slot:item.actions="{ item }">
            <v-btn size="x-small" color="primary" icon><v-icon >mdi-eye</v-icon></v-btn>
        </template>
        </v-data-table>
    </v-card>
</template>
<script>
import axios from 'axios';


export default{
    name:'AdminUsers',
    data(){
        return{
            loading:false,
            search:null,
            headers:[
                { title: 'Nombres', key: 'nombres' },
                { title: 'Documento', key: 'documento' },
                { title: 'Rol', key: 'rol' },
                { title: 'Email', key: 'email' },
                { title: 'Estado', key:'estado'},
                { title: '',key:'actions'},
            ],
            users:[],

        }
    },
    methods:{
        fetchListIUsers(){
            this.loading=true;
            axios.get('/api/get-list-users-for-admin').then(response=>{
                this.users=response.data;
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loading=false;
            })
        }
    },
    mounted(){
        this.fetchListIUsers()
    }
}
</script>