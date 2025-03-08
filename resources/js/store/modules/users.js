/**
 * 
 * Store para gestionarlos la carga de usuarios desde el servidor
 */

import { defineStore } from "pinia";
import axios from "axios";

export const usersStore = defineStore('Users', {
    state:()=>({
        users:[],
    }),
    actions:{
        /**
         * Obtiene los usuarios desde la API y los almacena en el estore
         * @param {boolean} [load=false] - Forzar la recarga de la api si ya fueron cargados.
         */
        fetchListIUsers(load=false){

            if(this.users.length && !load){
                return
            }
            axios.get('/api/get-list-users-for-admin').then(response=>{
                this.users=response.data;
            }).catch(error=>{
                alert(error)
            })
        }
    },getters:{
        /**Lista de usuarios almacenados */
        getUsers(state){
            return state.users;
        }
    }
});