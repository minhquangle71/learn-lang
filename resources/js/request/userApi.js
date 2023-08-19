import { request } from "./request"

export default {
    login: ({email, password}, successCall, failCall) => {
        request.post('/login', {email, password})
            .then((response) => {
                successCall(response)
            })
            .catch((response)=> {
                failCall(response)
            })
    }
}
