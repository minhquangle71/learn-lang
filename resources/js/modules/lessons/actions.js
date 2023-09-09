import lessonApi from "../../request/lessonApi";

export default {
    getLessonList: ({commit}) => {
        lessonApi.lessonList((response) => {
            if (response?.data?.result) {
                commit('SET_LESSON_LIST', {
                    lessonsList: response.data.result
                 })
            }
        }, (response) => {
            console.log(response)
        })
    },
    getLessonDetail: ({commit}, payload) => {
        lessonApi.lessonDetail(payload, (response) => {
            if (response?.data?.result) {
                commit('SET_LESSON_DETAIL', response.data.result)
            }
        }, (response) => {
            console.log(response)
        })
    },
}
