<template>
    <div>
      <v-app-bar color="warning">
          <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          <v-app-bar-title>Control financiero</v-app-bar-title>
          <v-spacer></v-spacer>
          <v-btn 
          size="small" 
          class="text-capitalize"
          @click="logout()"
          >
          <v-icon>mdi-logout</v-icon>
            salir
          </v-btn>
      </v-app-bar>
      
      <v-navigation-drawer
          v-model="drawer"
          :location="$vuetify.display.mobile ? 'bottom' : undefined"
          temporary
      >
      <v-list density="compact" nav>
        <v-list-item 
          v-for="(item,i) in items" :key="i"
          :title="item.title" 
          :value="item.title"
          :to="{name:item.value}"
          >
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
    </div>
</template>
<script>
import { authStore } from '../store/modules/auth';
export default {
  name:'Headerdefault',
  data: () => ({
    drawer: false,
    group: null,
    items: [
      {
        title: 'inicio',
        value: 'inicio.financiero',
      },
      {
        title: 'Categorias',
        value: 'categorias',
      },
      
      {
        title: 'Clasificaciones',
        value: 'clasificaciones',
      },
    
      {
        title: 'Genericas de gasto',
        value: 'genericas',
      },
      
      {
        title: 'Insumos',
        value: 'insumos',
      },
      
      {
        title: 'Detalles',
        value: 'detalles',
      },
      /*
      {
        title: 'tipo de cuentas',
        value: 'tipocuentas',
      },
      {
        title: 'Comprobantes',
        value: 'comprobantes',
      },*/
    ],
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
    group () {
      this.drawer = false
    },
    user(newval){
      if(!newval){
        this.$router.push({name:'login'})
      }
    }
  },
}
</script>