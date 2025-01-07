import { defineStore } from "pinia";
import axios from "axios";

export const RegistroStore = defineStore('Registro',{
    state:()=>({
        registros:[],

        loadRegistros:false,
    }),
    actions:{
        fetchRegistros(load=false){
            if(this.loadRegistros && !load){
                return;
            }
            axios.get('/api/registros').then(response=>{
                this.registros=response.data;
                this.loadRegistros=true;
            }).catch(e=>{})
        }
    },
    getters:{
        getRegistros(state){
            return state.registros;
        }
    }
})