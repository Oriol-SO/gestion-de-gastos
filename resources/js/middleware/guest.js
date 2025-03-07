import { authStore } from "../store/modules/auth"
export default ({to,from,next})=>{
    const auth=authStore();
    if(auth.check){
        return next({name:'inicio.admin'})
    }else{
        return next()
    }
}