import { authStore } from "../store/modules/auth";

export default ({to,from,next})=>{
    const auth=authStore();
    const rol=auth.getRol;
    if(rol!=1){
        return next('/notfound')
    }
    return next()
}