

import { defineStore } from "pinia";
import axios from "axios";

/**
 * Store `ResourceStore` para gestionar diferentes tipos de recursos en la aplicación.
 */

export const ResourceStore = defineStore('Resources', {
  state: () => ({
    /** @type {Array} Lista de categorías */
    categorias: [],
    /** @type {Array} Lista de clasificaciones */
    clasificaciones: [],
    /** @type {Array} Lista de genéricas */
    genericas: [],
    /** @type {Array} Lista de sub-items */
    subItems: [],
    /** @type {Array} Lista de insumos */
    insumos: [],
    /** @type {Array} Lista de detalles */
    detalles: [],
    /** @type {Array} Lista de tipos de cuentas */
    tipoCuentas: [],
    /** @type {Array} Lista de comprobantes */
    comprobantes: [],
    /** @type {Array} Lista de tipos de transacciones */
    transaccionTipos: [],
  }),

  actions: {
    /**
     * Obtiene las clasificaciones desde la API y los almacena en el estado
     * @param {boolean} [load=false] - Forzar la recarga de la api si ya fueron cargados.
     */
    fetchClasificaciones(load=false) {
      if (this.clasificaciones.length && !load) return;
      axios.get("/api/get-all-clasificaciones")
        .then(response => { this.clasificaciones = response.data; });
    },

    /**
     * Obtiene las genéricas desde la API.
     */
    fetchGenericas() {
      if (this.genericas.length) return;
      axios.get("/api/get-all-genericas")
        .then(response => { this.genericas = response.data; });
    },

    /**
     * Obtiene los sub-items de clasificación desde la API.
     */
    fetchSubItems() {
      if (this.subItems.length) return;
      axios.get("/api/get-all-sub-items-clasificacion")
        .then(response => { this.subItems = response.data; });
    },

    /**
     * Obtiene las categorías desde la API.
     *@param {boolean} [load=false] - Forzar la recarga de la api si ya fueron cargados.
     */
    fetchCategorias(load=false) {
      if (this.categorias.length && !load) return;
      axios.get("/api/get-categorias")
        .then(response => { this.categorias = response.data; });
    },

    /**
     * Obtiene los insumos desde la API.
     */
    fetchInsumos() {
      if (this.insumos.length) return;
      axios.get("/api/get-all-insumos")
        .then(response => { this.insumos = response.data; });
    },

    /**
     * Obtiene los detalles desde la API.
     */
    fetchDetalles() {
      if (this.detalles.length) return;
      axios.get('/api/get-all-detalles')
        .then(response => { this.detalles = response.data; });
    },

    /**
     * Obtiene los tipos de cuentas desde la API.
     */
    fetchTipoCuentas() {
      if (this.tipoCuentas.length) return;
      axios.get('/api/get-all-tipo-cuentas')
        .then(response => { this.tipoCuentas = response.data; });
    },

    /**
     * Obtiene los comprobantes desde la API.
     */
    fetchComprobantes() {
      if (this.comprobantes.length) return;
      axios.get('/api/get-all-tipo-comprobantes')
        .then(response => { this.comprobantes = response.data; });
    },

    /**
     * Obtiene los tipos de transacciones desde la API.
     */
    fetchTransacciones() {
      if (this.transaccionTipos.length) return;
      axios.get('/api/get-all-transaccion-tipos')
        .then(response => { this.transaccionTipos = response.data; });
    }
  },

  getters: {
    /** Devuelve los datos almacenados en el estado */
    getCategorias: state => state.categorias,
    getClasificaciones: state => state.clasificaciones,
    getGenericas: state => state.genericas,
    getSubItems: state => state.subItems,
    getInsumos: state => state.insumos,
    getDetalles: state => state.detalles,
    getTipoCuentas: state => state.tipoCuentas,
    getComprobantes: state => state.comprobantes,
    getTransaccionTipos: state => state.transaccionTipos
  }
});
