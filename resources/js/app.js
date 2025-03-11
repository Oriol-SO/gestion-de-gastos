/**
 * @file
 * @description Configuración principal de la aplicación Vue.
 */

import './bootstrap';
import { createApp } from 'vue';

import App from './components/App.vue';

/**
 * @typedef {Object} Plugins
 * @property {Vuetify} vuetify - Biblioteca UI basada en Material Design.
 * @property {VueRouter} router - Enrutador de la aplicación.
 * @property {Pinia} pinia - Sistema de gestión de estado.
 */

/**
 * Importa y configura los plugins principales de la aplicación.
 * @type {Plugins}
 */
import vuetify from './plugins/vuetify';
import router from './routes/index';
import pinia from './store';
//import './plugins/axios'


/**
 * Crea la instancia de la aplicación Vue y registra los plugins.
 */
const app=createApp(App)

app.use(vuetify)
app.use(router)
app.use(pinia)
app.mount("#app")