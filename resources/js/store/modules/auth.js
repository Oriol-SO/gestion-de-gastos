/**
 * Almacén `authstore` para gestionar el login y logout de usuarios.
 */

import { defineStore } from "pinia";
import axios from "axios";
import Cookies from "js-cookie";
export const authStore=defineStore('auth',{
    state:()=>({
        user:null,
        token:Cookies.get('token'),
        rol:null,
    }),
    actions: {
        async fetchUser(){
            try{
                const {data}= await axios.get('/api/user');
                this.user=data
                this.rol=data.rol_id
            }catch(error){
                this.userFailure()
            }
        },
        logout(){
            axios.post('/api/logout').then(res=>{
                this.user=null;
                this.token=null;
                this.rol=null;
                Cookies.remove('token')
            })
        },
        saveToken(token,expires) {
            this.token=token
            Cookies.set('token',token,{expires:expires})
        },
        userFailure(){
            this.user=null;
            this.token=null;
            this.rol=null;
            Cookies.remove('token')
        }
    },getters:{
        getUser(state){return state.user},
        getToken(state){return state.token},
        check(state){return state.user !==null },
        getRol(state){return state.rol},
        getFirstRoute(state){return searchRoute(state.rol)}
    }
})

function searchRoute(rol){
    switch(rol){
        case 1 :
            return 'inicio.admin'
        case 2 :
            return 'inicio.financiero'
        default:
            return 'notfound';
    }
}