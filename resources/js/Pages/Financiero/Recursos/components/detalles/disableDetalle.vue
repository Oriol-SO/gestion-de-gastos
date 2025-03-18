<template>
    <v-switch
    v-model="form.estado"
    hide-details
    density="compact"
    color="primary"
    :loading="loader"
    @change="disable"
    ></v-switch>
</template>
<script>
import Form from 'vform'
import { ResourceStore } from '../../../../../store/modules/resource';
export default{
    name:'disableDetalle',
    props:{
        item:{default:false}
    },
    data(){
        return{
            form: new Form({
                estado:this.item.estado,
                insumo:this.item.insumo_id,
                nombre:this.item.nombre,
                id:this.item.id,
            }),
            loader:false,
        }
    },
    methods:{
        /**
         * Envia el dato al servidor para habilitar o deshabilitar el registro
         */
        disable(){
            this.loader=true;
            this.form.post('/api/update-detalle').then(response=>{
                
            }).catch(error=>{
                alert(error)
            }).finally(()=>{
                this.loader=false;
            })
        }
    }
}
</script>