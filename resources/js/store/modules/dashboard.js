/**
 * Almacén `dashboardStore` para gestionar la información del control financiero
 * se gestiona la informacion de los graficos y vistas
 */

import { defineStore } from "pinia";
import moment from "moment";
import Form from 'vform'
import axios from "axios";

export const dashboardStore=defineStore('dashboard',{
    state:()=>({
        title:'',
        loader:false,
        datosgrafico:[],
        totalregistros:[],
        form: new Form({
            mes:moment().format('YYYY-MM'), //se inicia con el mes actual
            year:moment().year(), //se inicia con el año actual
            fecha1:'',
            fecha2:'',
            tipo:1, // 1: por mes , 2:por año, 3: entre fechas
        }),
        info:null // dentro de este esta //ingresos,gastos,utilidad,capital
    }),
    actions:{
            /**
             * Obtener las informacion de gastos,ingresos y utilidades
             */
            fetchResumenFinanciero(){
                this.loader=true;
                this.form.post('/api/get-info-resumen-financiero').then(response=>{
                    this.info=response.data.resumen[0];
                    this.datosgrafico=response.data.datos;
                    //cambiar el titulo
                    this.changueTitle()
                }).catch(error=>{
                    alert(error)
                }).finally(()=>{
                    this.loader=false
                })
            },

            /**
             * obtener el total de registros por categorias
             */
            fetchTotalRegistroscategoria(){
                axios.get('/api/get-total-registros-for-categoria').then(response=>{
                    this.totalregistros=response.data;
                }).catch(error=>{
                    alert(error)
                }).finally(()=>{
                })
            },

            /**
             * obtener el titulo del dashboard segun el tipo de periodo que elijamos
             */
            changueTitle(){
                if(this.form.tipo==1){
                    this.title=`${getNombreMes(this.form.mes)} de ${this.form.year}`  
                }else if(this.form.tipo==2){
                    this.title=`Año ${this.form.year}`  
                }else if(this.form.tipo==3){
                    this.title=`${this.form.fecha1} a ${this.form.fecha2}`  
                }
            }
    },
    getters:{
        getResumenFinanciero(state){
            return state.info;
        },
        getTitle(state){
            return state.title;
        },
        getLoader(state){
            return state.loader;
        },
        getDatosGrafico(state){
            return state.datosgrafico;
        },
        getTotalRegistros(state){
            return state.totalregistros;
        }
    }

})

/**
 * obtener el nombre del mes 
 * @param string fechaStr ejemplo '2025-03' 
 */
function getNombreMes(fechaStr) {
    // Convertir "YYYY-MM" en un objeto Date (asumiendo día 1 del mes)
    const fecha = new Date(`${fechaStr}-01`+ 'T00:00:00');

    // Obtener el nombre del mes en español
    return fecha.toLocaleString('es-ES', { month: 'long' });
}