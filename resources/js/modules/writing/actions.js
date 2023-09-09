import exercisesApi from "../../request/exercisesApi";

export default {
    getQuestion: ({commit}, {isInit, nodeId, answer, currentId, callback}) => {
        exercisesApi.writing({isInit, nodeId, answer, currentId}, ({data}) => {

            commit('SET_EXERCISE', {
                checkedExercise: data.result.checkedExercise,
                isDone         : data.result.isDone,
                question       : data.result.question,
                oldExercise    : data.result.oldExercise,
            })
            callback()

        }, (response) => {
            console.log(response)
        })

    }
}
