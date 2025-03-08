<template>
    <v-card class="pa-3" color="transparent" elevation="0">
       
        <v-card
        elevation="0"
        >
            <template v-slot:title>
                <span class=" text-h4 font-weight-bold">Usuarios</span>
            </template>
            <template v-slot:subtitle>
                <span class="text-warning">Administración de usuarios</span>
            </template>
       </v-card>

        <v-card class="pa-0 ma-0 mt-5" elevation="1">
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
                <addnewuser/>
            </v-card-title>
     
            <v-data-table 
            :items="users" 
            :loading="loading"
            :search="search"
            :headers="headers"
            
            >
            <template v-slot:item.rol="{ item }">
                <v-chip size="small" label :color="item.rol_id==1?'primary':'purple'">{{ item.rol }}</v-chip>
            </template>
            <template v-slot:item.estado="{ item }">
                <v-chip size="small" variant="flat"  :color="item.estado?'green':'red'">{{ item.estado?'Activo':'Inactivo' }}</v-chip>
            </template>
            <template v-slot:item.actions="{ item }">
                <edituser :item="item"/>
            </template>
            </v-data-table>
        </v-card>
    </v-card>
</template>
<script>
/**
 * componente asociadad a la ruta /admin/users  getiona la informacion y roles de los usuarios
 */
import addnewuser from './components/addnewuser.vue';
import edituser from './components/edituser.vue';
import { usersStore } from '../../../store/modules/users';
export default{
    name:'AdminUsers',
    components:{
        addnewuser,
        edituser
    },
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
        }
    },
    computed:{
        users(){
            const us=usersStore();
            return us.getUsers
        }
    },
    methods:{
        /**
         * ejecuta la funcion que esta en el store que se encarga de traer los usuarios y almacenarlos
         */
        fetchUsers(){
            const us=usersStore();
            us.fetchListIUsers();
        }
    },
    mounted(){
        this.fetchUsers()
    }
}
</script>