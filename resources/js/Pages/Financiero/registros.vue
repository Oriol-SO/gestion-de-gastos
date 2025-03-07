<template>
    <div>
        <v-card>
            <v-card-title>
                Registros
            </v-card-title>
            <v-card-text>
                <Tabla/>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
import Tabla from './components/Tabla.vue';
export default {
    name:'Registros',
    components:{
        Tabla
    }
}

</script>