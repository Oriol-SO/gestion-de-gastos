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
            color="primary"
            icon
            size="x-small"
            v-bind="activatorProps"
            @click="fetch_categoria"
            >
            <v-icon>mdi-eye</v-icon>
            </v-btn>
        </template>

        <v-card>
            <v-toolbar color="green-lighten-4">
                <v-toolbar-title >Editar registro</v-toolbar-title>
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
                <form action="" @submit.prevent="actualizar()" class="mt-4">

                    <v-row>
                        <v-col cols="12" md="2" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.fecha"
                            label="Fecha"
                            type="date"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.descripcion"
                            label="Descripción"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.ordenes"
                            label="Ordenes"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.proveedor"
                            label="Proveedor"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6" class="py-0">
                            <v-text-field
                            variant="outlined"
                            density="compact"
                            v-model="form.empresa"
                            label="Empresa"
                            outlined
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
                            outlined
                            color="orange"                            
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
                            outlined
                            color="orange"
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
                            outlined
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
                            outlined
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
                            outlined
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
                            outlined
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
                            outlined
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
                            outlined
                            color="primary"
                            ></v-autocomplete>
                        </v-col>
                        <v-col cols="12" md="4" class="py-0">
                            <v-text-field
                            v-model="form.gasto"
                            variant="outlined"
                            density="compact"
                            label="Gasto"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-text-field
                            v-model="form.ingreso"
                            variant="outlined"
                            density="compact"
                            label="Ingreso"
                            outlined
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
                            outlined
                            color="primary"
                            ></v-select>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-text-field
                            v-model="form.capital"
                            variant="outlined"
                            density="compact"
                            label="Capital"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3" class="py-0">
                            <v-text-field
                            v-model="form.utilidad"
                            variant="outlined"
                            density="compact"
                            label="Utilidad"
                            outlined
                            color="primary"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-btn
                            color="success"
                            type="submit"
                            :loading="loader"
                            >
                                ACTUALIZAR
                            </v-btn>
                            <v-btn
                            color="error"
                            class="ml-3"
                            :loading="loaderdel"
                            @click="deleteRegistro()"
                            >
                                Eliminar
                            </v-btn>
                        </v-col>          
                    </v-row>
                </form>
            </v-card>
        </v-card>
        </v-dialog>
    </div>
</template>
<script>
import Form from 'vform'
import { ResourceStore } from '../../../store/modules/resource';
export default {
    name: "editRegistro",
    props:{
        item:{default:null},
    },
    data: () => ({
        dialog: false,
        loader:false,
        loaderdel:false,
        form: new Form({
            id:null,
            fecha:null,
            descripcion:null,
            ordenes:null,
            proveedor:null,
            empresa:null,

            categoria:null,
            clasificacion:null,
            generica_gastos:null,
            compra:null,
            insumos:null,
            detalles:null,

            tipo_cuenta:null,
            comprobante:null,
            gasto:null,
            ingreso:null,
            transaccion:null,
            capital:null,
            utilidad:null,
        })
    }),
    computed:{
        categorias(){
            const rsc=ResourceStore();
            return rsc.getCategorias.filter(c=>(c.estado==1))
        },
        clasificaciones(){
            const rsc=ResourceStore();
            return rsc.getClasificaciones.filter((c)=>(c.categoria_id==this.form.categoria?.id && c.estado==1))
        },
        genericas(){
            const rsc=ResourceStore();
            return  rsc.getGenericas.filter((c)=>(c.categoria_id==this.form.categoria?.id && c.estado==1))
        },
        subItems(){
            const rsc=ResourceStore();
            return rsc.getSubItems.filter((s)=>(s.clasificacion_id==this.form.clasificacion?.id && s.estado==1));
        },
        insumos(){
            const rsc=ResourceStore();
            return rsc.getInsumos.filter((i)=>(i.generica_id==this.form.generica_gastos?.id && i.estado==1));
        },
        detalles(){
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
        actualizar(){
            this.form.id=this.item.id;
            this.loader=true;
            this.form.post('/api/update-registro').then(()=>{
                this.$emit('refresh');
                this.dialog=false;
            }).catch(e=>{
                this.form.reset();
                alert('error al actualizar');
            }).finally(()=>{
                this.loader=false;
            })
        },
        deleteRegistro(){
            if(!confirm('Estas seguro de realizar esta acción?')){
                return
            }
            this.loaderdel=true;
            axios.delete('/api/delete-registro/'+this.item.id).then(response=>{
                this.$emit('refresh');
                this.dialog=false;
            }).catch(e=>{
                alert('no se pudo eliminar')
            }).finally(()=>{
                this.loaderdel=false;
            })
        },

        fetch_categoria(){
            this.addItem();

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
        addItem(){
            this.form.fecha=this.item.fecha;
            this.form.descripcion=this.item.descripcion;
            this.form.ordenes=this.item.ordenes;
            this.form.proveedor=this.item.proveedor;
            this.form.empresa=this.item.empresa;

            this.form.categoria={id:this.item.categoria_id,nombre:this.item.categoria};
            this.form.clasificacion={id:this.item.clasificacion_id,nombre:this.item.clasificacion};
            this.form.generica_gastos={id:this.item.generica_id,nombre:this.item.generica};
            this.form.compra={id:this.item.compra_id,nombre:this.item.compra}
            this.form.insumos={id:this.item.insumo_id,nombre:this.item.insumo}
            this.form.detalles={id:this.item.detalle_id,nombre:this.item.detalle}

            this.form.tipo_cuenta=this.item.tipocuenta_id,
            this.form.comprobante=this.item.comprobante_id,
            this.form.gasto=this.item.gasto,
            this.form.ingreso=this.item.ingreso,
            this.form.transaccion=this.item.transaccion_id,
            this.form.capital=this.item.capital,
            this.form.utilidad=this.item.utilidad
        },
        
    }
}
</script>