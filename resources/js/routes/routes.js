/**
 * @module Routes
 * @description Se definen las rutas de la aplicacion
 */

//middlewares
import auth from '../middleware/auth';
import admin from '../middleware/admin';
import financiero from '../middleware/financiero';

import NotFound from '../Pages/errors/notFound.vue';
import Login from '../Pages/Auth/Login.vue';

import IndexFinanciero from '../Pages/Financiero/index.vue';
import Registros from '../Pages/Financiero/registros.vue';
import Categorias from '../Pages/Financiero/Recursos/Categorias.vue';
import Clasificaciones from '../Pages/Financiero/Recursos/Clasificaciones.vue';
import Genericas from '../Pages/Financiero/Recursos/Genericas.vue'
import Insumos from '../Pages/Financiero/Recursos/Insumos.vue'
import TipoCuentas from '../Pages/Financiero/Recursos/TipoCuentas.vue';
import Comprobantes from '../Pages/Financiero/Recursos/Comprobantes.vue';
import Detalles from '../Pages/Financiero/Recursos/Detalles.vue';


import IndexAdmin from '../Pages/Admin/index.vue';
import InicioAdmin from '../Pages/Admin/inicio/inicio.vue';
import UsersAdmin from '../Pages/Admin/users/users.vue';


/**
 * @typedef {Object} Route
 * @property {string} path - Ruta de la aplicación.
 * @property {string} name - Nombre de la ruta.
 * @property {Object} component - Componente Vue asociado a la ruta.
 * @property {Object} meta - Se configura el middleware o el layout que se quiera usar en esta ruta
 * @property {Array } children - Todas las rutas hijas o sub rutas
 */

/**
 * Lista de rutas definidas en la aplicación.
 * @type {Array<Route>}
 */
const routes=[
    // 🔹 Rutas públicas (sin autenticación)
    { path: '/:pathMatch(.*)*',name:'notfound', component:NotFound },
    
    {path: '/login',name:'login',component:Login, meta:{layout:'notlayout'}},



    // 🔹 Rutas protegidas (requieren autenticación)

    //rutas de admin
    //estas rutas tendran el prefijo /admin/{rutas hijas}
    {
        path:'/admin',
        component:IndexAdmin,
        meta:{middleware:[auth,admin]},
        children:[
            {path:'',redirect:{name:'users.admin'}},
            {path:'inicio',name:'inicio.admin',component:InicioAdmin},
            {path:'users',name:'users.admin',component:UsersAdmin}
        ]

    },


    //rutas de el usuario financiero
    {
        path:'/financiero',
        component:IndexFinanciero,
        meta:{middleware:[auth,financiero]},
        children:[
            {path:'',redirect:{name:'inicio.financiero'}},
            {path:'inicio',name:'inicio.financiero',component:Registros},
            {path:'ges-categorias',name:'categorias',component:Categorias},
            {path:'ges-clasificaciones',name:'clasificaciones',component:Clasificaciones},
            {path:'ges-genericas',name:'genericas',component:Genericas},
            {path:'ges-insumos',name:'insumos',component:Insumos},
            {path:'ges-detalles',name:'detalles',component:Detalles},
        
            {path:'ges-tipo-cuentas',name:'tipocuentas',component:TipoCuentas},
            {path:'ges-comprobantes',name:'comprobantes',component:Comprobantes},
        ]
    }
   


]

export default routes;