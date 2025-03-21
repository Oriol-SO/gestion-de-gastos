<template>
      <div id="chart" style="width: 100%;">
        <apexchart v-if="ready" type="area" height="550" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>
<script>
import VueApexCharts from "vue3-apexcharts";
import { dashboardStore } from "../../../../../store/modules/dashboard";
export default{
    name:'graficoTendencias',
    components:{
        apexchart:VueApexCharts
    },
    data(){
        return {     
          ready:false,
     
          configuracion: {
            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              },
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              width: [5, 7, 5],
              curve: 'straight',
              dashArray: [0, 8, 5]
            },
            title: {
              text: 'Tendencias',
              align: 'left'
            },
            legend: {
              tooltipHoverFormatter: function(val, opts) {
                return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + '</strong>'
              }
            },
            markers: {
              size: 0,
              hover: {
                sizeOffset: 6
              }
            },
            xaxis: {
         
            },
   
            grid: {
              borderColor: '#f1f1f1',
            }
          },
        }
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
              data: gastos,
            },
            {
              name: "ingresos",
              data: ingresos
            },
            {
              name: 'balance',
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
    },    
    mounted(){
        this.ready = true;
    }
}
</script>