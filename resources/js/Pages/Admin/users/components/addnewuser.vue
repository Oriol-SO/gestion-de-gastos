<template>
    
    <v-dialog
    v-model="dialog"
    max-width="1000"
    >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            prepend-icon="mdi-account-plus"
            text="Agregar"
            color="warning"
            v-bind="activatorProps"
            ></v-btn>
        </template>
        <v-card>
            <v-card-title>
                Agregar un nuevo usuario
            </v-card-title>
            <v-card-text>
                <v-form @submit.prevent="agregar" >
                    <v-row>
                        <v-col cols="12" sm="4">
                            <v-text-field
                            v-model="form.nombre"
                            label="Nombres"
                            density="compact"
                            :rules="[rules.required]"
                            variant="outlined"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="4">
                            <v-text-field
                            v-model="form.apellido_paterno"
                            label="Apellido paterno"
                            density="compact"
                            :rules="[rules.required]"
                            variant="outlined"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="4">
                            <v-text-field
                            v-model="form.apellido_materno"
                            label="Apellido materno"
                            density="compact"
                            :rules="[rules.required]"
                            variant="outlined"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="4">
                            <v-text-field
                            v-model="form.documento"
                            label="documento"
                            density="compact"
                            :rules="[rules.required,rules.documento]"
                            variant="outlined"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="5">
                            <v-text-field
                            v-model="form.email"
                            label="Email"
                            density="compact"
                            :rules="[rules.required,rules.email]"
                            variant="outlined"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="3">
                            <v-select
                            v-model="form.rol"
                            :items="roles"
                            label="Rol"
                            item-title="name"
                            item-value="id"
                            density="compact"
                            :rules="[rules.required]"
                            variant="outlined"
                            hint="Recuera que este campo ya no se podrá editar"
                            ></v-select>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-btn
                        color="green"
                        type="submit"
                        :loading="loader"
                        >
                            Enviar
                        </v-btn>
                    </v-row>
                </v-form>
            </v-card-text>
        </v-card>

    </v-dialog>
    
</template>
<script>
/**
 * Componente para agregar nuevos usuarios 
 */
import Form from 'vform'
import { usersStore } from '../../../../store/modules/users'
export default{
    name:'addnewuser',
    data(){
        return{
            dialog:false,
            loader:false,
            //formulario de registro de un usuario
            form:new Form({
                nombre:'',
                apellido_paterno:'',
                apellido_materno:'',
                documento:'',
                email:'',
                rol:'',
            }),
            //lista de roles que acepta el sistema
            roles:[
                {id:1,name:'Administrador'},
                {id:2,name:'Financiero'}
            ],

            //reglas de validacion
            rules:{
                required: (value) => (value!=='' )|| 'Este campo es requerido',
                documento: (value) => (!isNaN(value) && value.length >= 8) || 'El documento no es válido',
                email: (value) =>
                    /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value) || 'El correo electrónico no es válido',
            },
        }
    },methods:{
        /**
         * envia los datos del nuevo usuario al servidor
         */
        async agregar(event){
            const results= await event
            if(results.errors.length>0){
                return
            }

            this.errors=[];
            this.loading=true;
            this.form.post('/api/add-new-user').then(reponse=>{
                //refrescar la llamada a la api de users utilizando el store de users
                const us=usersStore();
                us.fetchListIUsers(true);
                //cerrar el dialog;
                this.dialog=false;
                //resetear el formulario
                this.form.reset();
            }).catch(error=>{

            }).finally(()=>{
                this.loader=false;
            })
        }
    }
}
</script>