import { MESSAGE_TYPE, LOCAL_STORAGE } from "../../constant";
import router from "../../router";
import userApi from "../../request/userApi";
import { useToast } from "vue-toast-notification";

export default {
    login: ({commit}, payload) => {
        const toast = useToast();
        userApi.login(payload, ({data}) => {
            let inform = {
                message: data.message,
                type: MESSAGE_TYPE.SUCCESS
            }

            if (data.success) {
                const userInfo = {
                    token: data.result.token,
                    email: data.result.email,
                }

                localStorage.setItem(LOCAL_STORAGE.USER_INFO, JSON.stringify(userInfo))

                commit('SET_LOGIN', {isLogin: true, email: data.result.email, inform})
            } else {
                inform = {
                    message: 'Login fail 200',
                    type: MESSAGE_TYPE.ERROR
                }

                commit('SET_INFORM', inform)
            }


            toast.open(inform)

            router.push({name: 'Home'})
        }, (response) => {
            let inform = {
                message: 'Login fail',
                type: MESSAGE_TYPE.ERROR
            }

            toast.open(inform)

            commit('SET_INFORM', inform)
        })

    },
    logout: ({commit}) => {
        const toast = useToast();
        let inform = {
            message: 'Logout success',
            type: MESSAGE_TYPE.SUCCESS
        }

        commit('LOGOUT')
        commit('SET_INFORM', inform)

        router.go('/login')
        localStorage.setItem(LOCAL_STORAGE.USER_INFO, null)
        toast.open(inform)
    }
}
