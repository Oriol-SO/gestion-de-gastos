import { authStore } from "../store/modules/auth"
export default async ({to, from, next}) => {
    const auth=authStore();
    if (!auth.check && auth.getToken) {
        try {
           await auth.fetchUser() 
        } catch (e) { }
    }
    return next()
}
