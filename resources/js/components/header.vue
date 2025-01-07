<template>
    <div>
        <v-app-bar color="warning">
            <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-app-bar-title>Control financiero</v-app-bar-title>
            <v-spacer></v-spacer>
            <v-chip >Tesoreria</v-chip>
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
  export default {
    name:'Header',
    data: () => ({
      drawer: false,
      group: null,
      items: [
        {
          title: 'inicio',
          value: 'home',
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

    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>