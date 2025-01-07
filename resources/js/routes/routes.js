import Home from '../Pages/Home/Home.vue';
import Categorias from '../Pages/Recursos/Categorias.vue';
import Clasificaciones from '../Pages/Recursos/Clasificaciones.vue';
import Genericas from '../Pages/Recursos/Genericas.vue'
import Insumos from '../Pages/Recursos/Insumos.vue'
import TipoCuentas from '../Pages/Recursos/TipoCuentas.vue';
import Comprobantes from '../Pages/Recursos/Comprobantes.vue';
import Detalles from '../Pages/Recursos/Detalles.vue';
const routes=[
    {path:'/',name:'home',component:Home},

    {path:'/ges-categorias',name:'categorias',component:Categorias},
    {path:'/ges-clasificaciones',name:'clasificaciones',component:Clasificaciones},
    {path:'/ges-genericas',name:'genericas',component:Genericas},
    {path:'/ges-insumos',name:'insumos',component:Insumos},
    {path:'/ges-detalles',name:'detalles',component:Detalles},

    {path:'/ges-tipo-cuentas',name:'tipocuentas',component:TipoCuentas},
    {path:'/ges-comprobantes',name:'comprobantes',component:Comprobantes},
]
export default routes;