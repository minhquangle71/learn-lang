import { request } from "./request"

export default {
    lessonList: (successCall, failCall) => {
        request.get('/node', {email, password})
            .then((response) => {
                successCall(response)
            })
            .catch((response)=> {
                failCall(response)
            })
    }
}
