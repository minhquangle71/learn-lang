import defaultState from "./state";

export default {
    SET_LOGIN(state, {isLogin, email, inform}) {
        state.isLogin = isLogin
        state.email   = email
        state.inform  = inform
    },

    LOGOUT(state) {
        state = defaultState
    },

    SET_INFORM(state, inform) {

        state.inform = inform
    },

}
