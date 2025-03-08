<template>

    <v-app-bar-nav-icon v-if="$vuetify.display.mobile" class="botton-navigation"  variant="text" color="warning"  @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
    <v-navigation-drawer
    v-model="drawer"
    elevation="0"
    :location="$vuetify.display.mobile ? 'left' : undefined"
    v-bind:temporary="$vuetify.display.mobile?true:false"
    >
       
         <v-list
          :lines="false"
          nav
        >
            <div 
            v-for="(item, i) in items"
            :key="i"
            >
                <v-list-group v-if="item.group" :value="item">
                    <template v-slot:activator="{ props }">
                        <v-list-item
                        color="warning"
                        v-bind="props"
                        :prepend-icon="item.icon"
                        :title="item.text"
                        ></v-list-item>
                    </template>

                    <v-list-item
                    v-for="(subitem,i) in item.children"
                    :value="subitem"
                    color="warning"
                    variant="flat"
                    :to="{name:subitem.link}"
                    >
                        <template v-slot:prepend>
                        <v-icon :icon="subitem.icon"></v-icon>
                        </template>

                        <v-list-item-title v-text="subitem.text"></v-list-item-title>
                    </v-list-item>
                </v-list-group>

                <v-list-item
                v-else
                :value="item"
                color="warning"
                variant="flat"
                :to="{name:item.link}"
                >
                    <template v-slot:prepend>
                    <v-icon :icon="item.icon"></v-icon>
                    </template>

                    <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item>
            </div>
        </v-list>
    </v-navigation-drawer>
</template>
<script>
export default{
   name:'navigation',
   props:{
        items:{default:[]}
   },
   data(){
    return{
        drawer:true,
    }
   },
   watch:{
    group(newval){
        this.drawer=false
    }
   }

}
</script>
<style scoped>

.botton-navigation{
    position: absolute;
    top:8px;
    z-index: 10000;
    
}

</style>