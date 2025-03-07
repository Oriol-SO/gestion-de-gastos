import { createRouter, createWebHistory} from "vue-router";
import routes from "./routes.js";
import checkAuth from "../middleware/check-auth.js";

const router = new createRouter({
    history: createWebHistory(),
    routes
})

function nextFactory(context, middleware, index) {
    const nextMiddleware = middleware[index];

    if (!nextMiddleware){
        return context.next;
    }
    const subsequentMiddleware = nextFactory(context, middleware, index + 1);
    return () => {
        return new Promise((resolve, reject) => {
        try {
            // Ejecuta el middleware con el contexto y una función para llamar al siguiente middleware
            Promise.resolve(nextMiddleware({ ...context, next: subsequentMiddleware }))
            .then(resolve)
            .catch(reject);
        } catch (error) {
            reject(error);
        }
        });
    };
}

router.beforeEach((to, from, next) => {
    //console.log(App.methods.setLayout('basic'))
    if(!to.meta.middleware){
        return next();
    }
    const context = {
        to,
        from,
        next
    };
    const middleware=[checkAuth]
    const listMidd = Array.isArray(to.meta.middleware)
        ? to.meta.middleware
        : [to.meta.middleware];
    middleware.push(...listMidd)

    nextFactory(context, middleware, 0)()
    .then(() => {
        //console.log('Todos los middlewares se han ejecutado');
    })
    .catch(error => {
        //console.error('Error en la ejecución del middleware:', error);
    });
    //return middleware[0]({ ...context, next: nextFactory(context, middleware, 1) });

});
export default router
  
  
  