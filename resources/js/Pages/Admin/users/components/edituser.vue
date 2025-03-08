<template>
    
    <v-dialog
    v-model="dialog"
    max-width="1000"
    >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn 
            size="small" 
            color="warning"
            variant="text" 
            icon
            v-bind="activatorProps"
            >
                <v-icon >mdi-pencil</v-icon>
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                Editar Usuario
            </v-card-title>
            <v-card-text>
                Rol:<v-chip color="warning">{{ item.rol }}</v-chip>
                <div>
                    <v-switch
                    label="Estado"
                    v-model="form.estado"
                    hide-details
                    color="green"
                    density="compact"
                    ></v-switch>
                </div>
            </v-card-text>
            <v-card-text>
                <v-form @submit.prevent="update" >
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
                            <v-switch
                            label="Resetear contraseña"
                            hide-details
                            density="compact"
                            color="purple"
                            v-model="form.resetear"
                            ></v-switch>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-btn
                        color="primary"
                        type="submit"
                        :loading="loader"
                        >
                            Actualizar
                        </v-btn>
                    </v-row>
                </v-form>
            </v-card-text>
        </v-card>

    </v-dialog>
    
</template>
<script>
/**
 * Componente para editar usuarios 
 */
import Form from 'vform'
import { usersStore } from '../../../../store/modules/users'
export default{
    name:'edituser',
    props:{
        item:{default:null}
    },
    data(){
        return{
            dialog:false,
            loader:false,
            //formulario con los datos del usuario
            form:new Form({
                id:null,
                nombre:this.item.name,
                apellido_paterno:this.item.ape_pat,
                apellido_materno:this.item.ape_mat,
                documento:this.item.documento,
                email:this.item.email,
                estado:this.item.estado,
                resetear:false,
            }),

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
         * envia los datos del formulario al servidor
         */
        async update(event){
            const results= await event
            if(results.errors.length>0){
                return
            }
            this.form.id=this.item.id;
            this.errors=[];
            this.loading=true;
            this.form.post('/api/update-user').then(reponse=>{
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