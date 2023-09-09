import { request } from "./request"

export default {
    writing: ({ isInit, nodeId, answer, currentId },successCall, failCall) => {
        request.get('/writing', {
                params: {
                    is_init: isInit,
                    node_id: nodeId,
                    answer: answer,
                    current_id: currentId
                }
            })
            .then((response) => {
                successCall(response)
            })
            .catch((response)=> {
                failCall(response)
            })
    },
}
