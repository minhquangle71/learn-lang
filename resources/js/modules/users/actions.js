import { MESSAGE_TYPE } from "../../constant";
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
                localStorage.setItem('token', data.result.token)

                commit('SET_LOGIN', {isLogin: true, email: data.email, inform})
            } else {
                inform = {
                    message: 'Login fail 200',
                    type: MESSAGE_TYPE.ERROR
                }

                commit('SET_INFORM', inform)
            }


            toast.open(inform)

            router.push({name: 'Levels'})
        }, (response) => {
            let inform = {
                message: 'Login fail',
                type: MESSAGE_TYPE.ERROR
            }

            toast.open(inform)

            commit('SET_INFORM', inform)
        })

    }
}
