<template>
    <div id="chart" style="width: 100%;">
        <apexchart v-if="ready" type="radialBar" height="550" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>
<script>
import VueApexCharts from 'vue3-apexcharts';
import { dashboardStore } from '../../../../../store/modules/dashboard';

export default{
    name:'pieGrafico', //grafico de tortas
    components: {
      apexchart: VueApexCharts
    },
    data(){
        return{
            ready:false,
            
          
            //series: [44, 55, 67, 83],
            chartOptions: {
                chart: {
                height: 350,
                type: 'radialBar',
                },
                plotOptions: {
                radialBar: {
                    dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: false,
                        label: 'Total',
                        formatter: function (w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return 249
                        }
                    }
                    }
                }
                },
                labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
            },
          
        }
    },computed:{
        series(){
            const dash=dashboardStore();
            const datos=dash.getTotalRegistros

            return datos.map((item)=>(item.registros));
        }
    },methods:{
        fetchInfo(){
            const dash=dashboardStore();
            dash.fetchTotalRegistroscategoria();
        }
    },
    created(){
        this.ready=true;
        this.fetchInfo();
    }
}
</script>