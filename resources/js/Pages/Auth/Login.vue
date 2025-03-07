

<template>
    <div class="opacity-90 fondo-login d-flex" >
      <v-card
        class="mx-auto my-auto pa-12 pb-8"
        elevation="8"
        width="448"
        rounded="lg"
      >
        <v-card-title class="text-center">
            <v-img src="/img/eslogan.png" cover ></v-img>
        </v-card-title>
        <v-card-title class="text-center" >
          Iniciar Sesión
        </v-card-title>
        <v-form  @submit.prevent="login" validate-on="submit" >
          <div class="text-subtitle-1 text-medium-emphasis">Email</div>
    
          <v-text-field
            color="warning"
            density="compact"
            placeholder="Email"
            prepend-inner-icon="mdi-account"
            variant="outlined"
            :rules="emailRules"
            v-model="form.email"
            type="text"
            :error-messages="errors.email"
          ></v-text-field>
    
          <div class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between " >
            Contraseña
          </div>
    
          <v-text-field
            color="warning"
            :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
            :type="visible ? 'text' : 'password'"
            density="compact"
            placeholder="Contraseña"
            prepend-inner-icon="mdi-lock-outline"
            variant="outlined"
            @click:append-inner="visible = !visible"
            v-model=form.password
            :rules="passwordRules"
            :error-messages="errors.password"
          ></v-text-field>
          <v-alert type="error" variant="tonal" v-if="msg">
            {{ msg }}
          </v-alert>
          <v-btn
            class="mb-8"
            color="warning"
            size="large"
            block
            type="submit"
            :loading="loading"
          >
            INGRESAR
          </v-btn>
          <!--div class="text-subtitle-1 text-medium-emphasis d-flex align-center justify-space-between">
            <a
              class=" text-decoration-none text-blue"
              href="#"
              rel="noopener noreferrer"
              target="_blank"
            >
            ¿Olvidó su contraseña?</a>
          </div-->
        </v-form>
      </v-card>
    </div>
</template>

<script>
/**
 * Componente de la vista de inicio de sesión.
 * @exports components/Login
 */

import { authStore } from '../../store/modules/auth';
import Form from 'vform'
export default {
    name: 'Login',
    /**
     * Datos que se usaran dentro del componente
     */
    data(){
        return{
            /** este dato es de tipo bool el cual gestiona la visualizacion de la contraseña */
            visible:false,

            /**creamos un objeto de tipo vform para interactuar con nuestro formulario*/
            form:new Form({
                email:null,
                password:null,
            }),

            loading:false,
            msg:null,

            /**reglas de validación */
            emailRules:[
                value => {
                    if (!value) return 'El email es requerido';
                    // Expresión regular para validar emails
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;                    
                    return emailPattern.test(value) ? true : 'El email no es válido';
                }
            ],
            passwordRules:[
                value=>{
                if(value) return true;
                    return 'La contraseña es requerida'
                }
            ],
            errors:[],
        }
    },  
    methods: {
        /**
         * Envía las credenciales al servidor para autenticación.
         *
         * @param {Event} event - Evento que activa el inicio de sesión.
         * @returns {Promise<void>} - No devuelve ningún valor directamente, pero maneja la autenticación.
         *
         * @description
         * - Limpia errores previos y mensajes antes de procesar la solicitud.
         * - Espera la validación previa de `event`.
         * - Si hay errores en `results.errors`, detiene la ejecución.
         * - Activa el estado de carga (`loading = true`).
         * - Envía una solicitud `POST` a `/api/login` con los datos del formulario.
         * - Si la respuesta es exitosa, guarda el token de acceso.
         * - Captura errores y actualiza mensajes según el código de estado HTTP.
         * - Desactiva el estado de carga al finalizar la solicitud.
         */
        async login(event){
            try{
                this.errors=[];
                this.msg="";
                const results= await event
                if(results.errors.length>0){
                    return
                }
                this.loading=true;
                this.form.post('/api/login').then(response=>{
                    this.save(response.data)
                }).catch(error=>{
                if(error.response.status==422){
                    this.errors=error.response.data.errors;
                }else{
                    this.msg=error.response.data.message;
                }
                }).finally(()=>{
                this.loading=false;
                });
            }catch(error){
                alert(error)
            }
        },
        /**
         * Guarda el token de autenticacion y redirige al usuario.
         * @param {Object} data - Dato de autenticacion recibidos del servidor.
         * 
         * @description
         * - Obtiene la instancia del store de autenticación (`authStore`).
         * - Guarda el token de acceso y su tiempo de expiración.
         * - Solicita la información del usuario autenticado (`fetchUser`).
         * - Obtiene la primera ruta accesible para el usuario (`getFirstRoute`).
         * - Redirige al usuario a dicha ruta utilizando Vue Router.
         */
        async save(data){
            const auth=authStore();
            auth.saveToken(data.access_token,data.expires_in)
            
            await auth.fetchUser();
            
            const firstRoute=auth.getFirstRoute
            console.log(firstRoute);
            this.$router.push({name:firstRoute})
        }
    }
};
</script>

<style scoped>
.fondo-login{
  height: 100vh;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
  url('/img/fondo.jpg');
  background-size: cover;
}

.fondo-form{
  background-color: rgba(0, 0, 0, 0.5);
}
</style>