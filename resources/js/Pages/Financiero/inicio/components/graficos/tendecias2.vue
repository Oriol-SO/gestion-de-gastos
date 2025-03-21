<template>
    <div style="width: 100%;">
      <apexchart v-if="ready" type="line" height="550" :options="chartOptions" :series="series"></apexchart>
    </div>
  </template>
  
  <script>
  import VueApexCharts from "vue3-apexcharts";
import { dashboardStore } from "../../../../../store/modules/dashboard";
  
  export default {
    components: {
      apexchart: VueApexCharts
    },
    data() {
      return {
        ready:false,
        configuracion: {
            chart: {
                height: 350,
                type: 'line',
                stacked: false
            },
            
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [1, 1, 4],
                curve: 'straight',
                dashArray: [0, 8, 5]
            },
            title: {
                text: 'tendencias',
                align: 'left',
                offsetX: 110
            },
            xaxis: {
        
            },
            
            tooltip: {
                fixed: {
                enabled: true,
                position: 'topLeft',
                offsetX: 60
                },
            },
            legend: {
                horizontalAlign: 'left',
                offsetX: 40
            }
        },

      };
    },
    computed:{
        series(){
            const dash=dashboardStore();
            const datos= dash.getDatosGrafico
            const gastos=datos.map((item)=>(item.gastos))
            const ingresos=datos.map((item)=>(item.ingresos))
            const balance=datos.map((item)=>(item.balance))
            return[
                {
                name: "Gastos",
                type: 'column',
                data: gastos,
                },
                {
                name: "ingresos",
                type: 'column',
                data: ingresos
                },
                {
                name: 'balance',
                type: 'line',
                data: balance
                }
            ]
        },  
        chartOptions(){
            const dash=dashboardStore();
            const datos= dash.getDatosGrafico
            this.configuracion.xaxis={
                categories: datos.map((item)=>(item.fecha))
            }
            return this.configuracion; 
        }
    },mounted(){
        this.ready = true;
    }
  };
  </script>
  