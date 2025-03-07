import { authStore } from '../store/modules/auth'
import Cookies from 'js-cookie'

export default ({to,from,next}) => {
    const auth=authStore();
    if(!auth.check) {
      console.log('no logeadu')
      Cookies.set('intended_url',to.path)
      next({ name: 'login' })
    } else {
      next()
    }
}
