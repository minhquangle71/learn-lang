import { request } from "./request"

export default {
    lessonList: (successCall, failCall) => {
        request.get('/node')
            .then((response) => {
                successCall(response)
            })
            .catch((response)=> {
                failCall(response)
            })
    },
    lessonDetail: ({id}, successCall, failCall) => {
        request.get(`/node/${id}`)
            .then((response) => {
                successCall(response)
            })
            .catch((response)=> {
                failCall(response)
            })
    }
}
