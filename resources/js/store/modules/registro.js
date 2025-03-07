

/**
 * Almacén `RegistroStore` para gestionar los registros.
 */
import { defineStore } from "pinia";
import axios from "axios";

export const RegistroStore = defineStore('Registro', {
  state: () => ({
    /** @type {Array} Lista de registros obtenidos de la API */
    registros: [],

    /** @type {boolean} Indica si los registros han sido cargados */
    loadRegistros: false,
  }),

  actions: {
    /**
     * Obtiene los registros desde la API y los almacena en el estado
     * @param {boolean} [load=false] - Forzar la recarga de registros si ya fueron cargados.
     */
    fetchRegistros(load = false) {
        if (this.loadRegistros && !load) return;

        axios.get('/api/registros')
        .then(response => {
          this.registros = response.data;
          this.loadRegistros = true;
        })
        .catch(() => {});
    }
  },

  getters: {
    /**
     * Obtiene la lista de registros almacenados.
     */
    getRegistros(state) {
        return state.registros;
    }    
  }
});
