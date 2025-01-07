import { defineStore } from "pinia";
import axios from "axios";

export const ResourceStore = defineStore('Resources',{
    state:()=>({
        categorias:[],
        clasificaciones:[],
        genericas:[],
        subItems:[],

        insumos:[],
        detalles:[],
        tipoCuentas:[],
        comprobantes:[],
        transaccionTipos:[],
    }),
    actions:{
        fetchClasificaciones(){
            if(this.clasificaciones.length){
                return
            }

            axios.get("/api/get-all-clasificaciones").then(response=>{
                this.clasificaciones=response.data;
            })
        },
        fetchGenericas(){
            if(this.genericas.length){
                return
            }
            axios.get("/api/get-all-genericas").then(response=>{
                this.genericas=response.data;
            })
        },
        fetchSubItems(){
            if(this.subItems.length){
                return
            }
            axios.get("/api/get-all-sub-items-clasificacion").then(response=>{
                this.subItems=response.data;
            })
        },
        fetchCategorias(){
            if(this.categorias.length>0){
                return
            }
            axios.get("/api/get-categorias").then(response=>{
                this.categorias=response.data;
            }).catch(e=>{

            });
        },
        fetchInsumos(){
            if(this.insumos.length>0){
                return
            }
            axios.get("/api/get-all-insumos").then(response=>{
                this.insumos=response.data;
            }).catch(e=>{

            });
        },
        fetchDetalles(){
            if(this.detalles.length>0){
                return
            }
            axios.get('/api/get-all-detalles').then(response=>{
                this.detalles=response.data;
            }).catch(e=>{

            })
        },
        fetchTipoCuentas(){
            if(this.tipoCuentas.length>0){
                return
            }
            axios.get('/api/get-all-tipo-cuentas').then(response=>{
                this.tipoCuentas=response.data;
            }).catch(e=>{

            })
        },
        fetchComprobantes(){
            if(this.comprobantes.length>0){
                return
            }
            axios.get('/api/get-all-tipo-comprobantes').then(response=>{
                this.comprobantes=response.data;
            }).catch(e=>{

            }) 
        },
        fetchTransacciones(){
            if(this.transaccionTipos.length>0){
                return
            }
            axios.get('/api/get-all-transaccion-tipos').then(response=>{
                this.transaccionTipos=response.data;
            }).catch(e=>{

            }) 
        }
    },
    getters:{
        getCategorias(state){
            return state.categorias
        },
        getClasificaciones(state){
            return state.clasificaciones
        },
        getGenericas(state){
            return state.genericas
        },
        getSubItems(state){
            return state.subItems
        },
        getInsumos(state){
            return state.insumos;
        },
        getDetalles(state){
            return state.detalles;
        },
        getTipoCuentas(state){
            return state.tipoCuentas;
        },
        getComprobantes(state){
            return state.comprobantes;
        },
        getTransaccionTipos(state){
            return state.transaccionTipos;
        }
    }
});