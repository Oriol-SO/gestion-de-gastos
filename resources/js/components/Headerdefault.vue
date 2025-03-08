<template>
    <div v-if="user">
      <v-app-bar  elevation="0" >
          <img height="100%" class="ml-15" src="/img/eslogan.png" alt="">
  
          <v-spacer></v-spacer>

          <v-chip 
          :color="user.rol_id==1?'primary':'purple'"

          >
            {{ user.rol_id==1?'Administrador':'Financiero' }}
          </v-chip>

          <v-menu
          v-model="menu"
          :close-on-content-click="false"
          location="bottom"
          transition="scale-transition"
          >
            <template v-slot:activator="{ props }">
                <v-btn
                  v-bind="props"
                  icon
                >
                <v-avatar
                  class="ma-0 pa-0"
                  size="40"
                  image="/img/user.jpg"
                >
                </v-avatar>
                </v-btn>
            </template>
            <v-sheet
            class="pa-6"
            max-width="460"
            >
                <h6 class="text-h6 font-weight-bold mb-4">Perfil</h6>
                <v-card elevation="0">
                  <template v-slot:title>
                      <span class="text-h6" >{{ user.name+' '+user.ape_pat+' '+ user.ape_mat }}</span>
                  </template>
                  <template v-slot:subtitle>
                      <span ><v-icon>mdi-account-cog</v-icon>{{ user.rol_id==1?'Administrador':'Financiero' }}</span> <br>
                      
                      <span><v-icon>mdi-email</v-icon> {{ user.email }}</span>
                  </template>

                  <v-card-actions > 
                    <v-btn 
                    width="100%"
                    color="warning"
                    variant="outlined"
                    class="text-capitalize"
                    @click="logout()"
                    >
                      <v-icon>mdi-logout</v-icon>
                      Cerrar Sesión
                    </v-btn>
                  </v-card-actions>
                </v-card>
         
            </v-sheet>

          </v-menu>

        
      </v-app-bar>
    </div>
</template>
<script>
import { authStore } from '../store/modules/auth';
export default {
  name:'Headerdefault',
  data: () => ({
    menu:false,
  }),
  computed:{
    user(){
      const auth=authStore();
      return auth.getUser
    }
  },
  methods:{
    /**
     * cerrar sesion y salir de la aplicación
     */
    logout(){
      const auth= authStore();
      auth.logout();
    }
  },  
  watch: {
    user(newval){
      if(!newval){
        this.$router.push({name:'login'})
      }
    }
  },
}
</script>