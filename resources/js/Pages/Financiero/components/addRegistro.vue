<template>
    <div class="text-center pa-4">
        <v-dialog
        v-model="dialog"
        transition="dialog-bottom-transition"
        max-width="1300"
        persistent
        >
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
            prepend-icon="mdi-plus"
            text="Agregar"
            color="warning"
            v-bind="activatorProps"
            @click="fetch_categoria"
            ></v-btn>
        </template>

        <v-card>
            <v-toolbar color="orange-lighten-4">
                <v-toolbar-title >Agregar nuevo registro</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                    <v-btn
                    text="Cerrar"
                    variant="text"
                    @click="dialog = false"
                    ></v-btn>
                </v-toolbar-items>
            </v-toolbar>
            <v-card class="py-4 px-5" elevation="0">
                <v-form @submit.prevent="agregar"  class="mt-4">

                    <v-row>
                        <v-col cols="12" md="2" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.fecha"
                            label="Fecha"
                            type="date"
                            color="primary"
                            :rules="[rules.required]"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.descripcion"
                            label="Descripción"
                            color="primary"
                            :rules="[rules.required]"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.ordenes"
                            label="Ordenes"
                            color="primary"
                            :rules="[rules.required]"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.proveedor"
                            label="Proveedor"
                            color="primary"
                            :rules="[rules.required]"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.empresa"
                            label="Empresa"
                            :rules="[rules.required]"
                            color="primary"
                            ></v-text-field>
                        </v-col>


                        <!--los elementos seleccionable-->
                        <div class="my-12"></div>

                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.categoria"
                            variant="outlined"
                            density="compact"
                            :items="categorias"
                            item-title="nombre"
                            return-object
                            label="Categoria"
                            color="orange"
                            :rules="[rules.required]"                            
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.clasificacion"
                            variant="outlined"
                            density="compact"
                            item-title="nombre"
                            return-object
                            :items="clasificaciones"
                            label="clasificación"
                            color="orange"
                            :rules="[rules.required]"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.generica_gastos"
                            variant="outlined"
                            density="compact"
                            :items="genericas"
                            item-title="nombre"
                            return-object
                            label="Generica de gastos"
                            color="orange"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0" >
                            <v-autocomplete
                            v-model="form.compra"
                            variant="outlined"
                            density="compact"
                            :items="subItems"
                            item-title="nombre"
                            return-object
                            label="Compra"
                            color="orange"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.insumos"
                            variant="outlined"
                            density="compact"
                            :items="insumos"
                            item-title="nombre"
                            return-object
                            label="Insumos"
                            color="orange"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.detalles"
                            variant="outlined"
                            density="compact"
                            :items="detalles"
                            item-title="nombre"
                            return-object
                            label="Detalles"
                            color="orange"
                            ></v-autocomplete>
                        </v-col>

                        <div class="my-12"></div>

                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.tipo_cuenta"
                            variant="outlined"
                            density="compact"
                            :items="tipoCuentas"
                            item-title="nombre"
                            item-value="id"
                            label="Tipo de cuenta"
                            color="primary"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-autocomplete
                            v-model="form.comprobante"
                            variant="outlined"
                            density="compact"
                            :items="comprobantes"
                            item-title="nombre"
                            item-value="id"
                            label="Comprobante"
                            color="primary"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-text-field
                            v-model="form.gasto"
                            variant="outlined"
                            density="compact"
                            label="Gasto"
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-text-field
                            v-model="form.ingreso"
                            variant="outlined"
                            density="compact"
                            label="Ingreso"
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-select
                            v-model="form.transaccion"
                            variant="outlined"
                            density="compact"
                            :items="transacciones"
                            item-title="nombre"
                            item-value="id"
                            label="Transacción"
                            color="primary"
                            ></v-select>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-text-field
                            v-model="form.capital"
                            variant="outlined"
                            density="compact"
                            label="Capital"
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-text-field
                            v-model="form.utilidad"
                            variant="outlined"
                            density="compact"
                            label="Utilidad"
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-btn
                            color="success"
                            type="submit"
                            :loading="loader"
                            >
                                REGISTRAR
                            </v-btn>
                        </v-col>          
                    </v-row>
                </v-form>
            </v-card>
        </v-card>
        </v-dialog>
    </div>
</template>
<script>
import Form from 'vform'
import { ResourceStore } from '../../../store/modules/resource';
export default {
    name: "addRegistro",
    data: () => ({
        dialog: false,
        loader:false,
        form: new Form({
            fecha:'',
            descripcion:'',
            ordenes:'',
            proveedor:'',
            empresa:'',

            categoria:'',
            clasificacion:'',
            generica_gastos:'',
            compra:'',
            insumos:'',
            detalles:'',

            tipo_cuenta:'',
            comprobante:'',
            gasto:'',
            ingreso:'',
            transaccion:'',
            capital:'',
            utilidad:'',
        }),

        //reglas de validacion
        rules:{
            required: (value) => (value!=='' )|| 'Este campo es requerido',
        },
    }),
    computed:{
        categorias(){
            const rsc=ResourceStore();
            return rsc.getCategorias.filter(c=>(c.estado==1))
        },
        clasificaciones(){
            this.clearClasificacion();
            this.clearGenerica();
            this.clearCompra();
            const rsc=ResourceStore();
            return rsc.getClasificaciones.filter((c)=>(c.categoria_id==this.form.categoria?.id && c.estado==1))
        },
        genericas(){
            this.clearGenerica();
            this.clearCompra();
            const rsc=ResourceStore();
            return  rsc.getGenericas.filter((c)=>(c.categoria_id==this.form.categoria?.id && c.estado==1))
        },
        subItems(){
            this.clearCompra();
            const rsc=ResourceStore();
            return rsc.getSubItems.filter((s)=>(s.clasificacion_id==this.form.clasificacion?.id && s.estado==1));
        },
        insumos(){
            this.clearInsumos();
            const rsc=ResourceStore();
            return rsc.getInsumos.filter((i)=>(i.generica_id==this.form.generica_gastos?.id && i.estado==1));
        },
        detalles(){
            this.clearDetalle()
            const rsc=ResourceStore();
            return rsc.getDetalles.filter((d)=>(d.insumo_id==this.form.insumos?.id && d.estado==1));
        },
        tipoCuentas(){
            const rsc=ResourceStore();
            return rsc.getTipoCuentas.filter(c=>(c.estado==1))
        },
        comprobantes(){
            const rsc=ResourceStore();
            return rsc.getComprobantes.filter(c=>(c.estado==1))
        },
        transacciones(){
            const rsc=ResourceStore();
            return rsc.getTransaccionTipos.filter(c=>(c.estado==1))
        }
    },
    methods: {
        async agregar(event){
            const results= await event
            if(results.errors.length>0){
                return
            }

            this.loader=true;
            this.form.post('/api/add-new-registro').then(()=>{
               this.$emit('refresh')
               this.dialog=false;
               this.form.reset();
            }).catch(e=>{
                alert(e)
            }).finally(()=>{
                this.loader=false;
            })
        },
        fetch_categoria(){
            const rsc=ResourceStore();
            rsc.fetchCategorias();
            rsc.fetchClasificaciones();
            rsc.fetchGenericas();
            rsc.fetchSubItems();
            rsc.fetchInsumos();
            rsc.fetchDetalles();
            rsc.fetchTipoCuentas();
            rsc.fetchComprobantes();
            rsc.fetchTransacciones();
        },
        clearClasificacion(){
            this.form.clasificacion='';
        },
        clearGenerica(){
            this.form.generica_gastos='';
        },
        clearCompra(){
            this.form.compra='';
        },
        clearInsumos(){
            this.form.insumos='';
        },
        clearDetalle(){
            this.form.detalles='';
        }
        
    }
}
</script>