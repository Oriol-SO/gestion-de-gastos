

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
    cargaRegistros: false,

    /**@type {boolean} Es el que se encarga de mostrar la vista del loader */
    loader:false,

    title:'',
  }),

  actions: {
    /**
     * Obtiene los registros desde la API y los almacena en el estado
     * @param {boolean} [load=false] - Forzar la recarga de registros si ya fueron cargados.
     */
    fetchRegistros(load = false) {
        if (this.cargaRegistros && !load) return;
        this.loader=true;
        axios.get('/api/get-ultimos-registros')
        .then(response => {
          this.registros = response.data;
          this.cargaRegistros = true;
          this.title='Ultimos 50 registros';
        })
        .catch(() => {})
        .finally(()=>{
          this.loader=false
        });
    },

    /**
     * actualizamos el array de registros despues de filtrar
     * @param {Array} [newregistros] - la lista de nuevos registros obtenidos
     */
    updateRegistros(newregistros){
      this.registros=newregistros;
    },

    /**
     * actualizar load
     */
    updateLoad(load){
      this.loader=load;
    },

    updateTitle(newtitle){
      this.title=newtitle;
    }
  },

  getters: {
    /**
     * Obtiene la lista de registros almacenados.
     */
    getRegistros(state) {
        return state.registros;
    },    

    getLoader(state){
      return state.loader
    },
    
    getTitle(state){
      return state.title;
    }
  }
});
