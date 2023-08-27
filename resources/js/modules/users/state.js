import { LOCAL_STORAGE } from "../../constant";

const localUser = localStorage.getItem(LOCAL_STORAGE.USER_INFO)
const userInfo =  localUser ? JSON.parse(localUser) : null

export default {
    isLogin: userInfo?.token ? true: false,
    email  : userInfo?.email ?? '',
    inform : {
        message: '',
        type   : ''
    }
}
