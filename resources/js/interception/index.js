import { mapState } from "vuex";
import router from "../router";
import store from "../store";

router.beforeEach(async (to, from, next) => {
    const isLogin = store.getters['users/isLogin']


    if (to.matched.some((record) => record.meta.requiresAuth) && !isLogin) {
        next('/login')
    } else if (isLogin) {
        switch (to.name) {
            case 'Login' || 'Register' || 'ResetPassword':
                next({ path: '/' })
                break
            default:
                next()
                break
        }
    } else {
        next()
    }
})
