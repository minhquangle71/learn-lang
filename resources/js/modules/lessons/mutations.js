import defaultState from "./state"

export default {
    SET_LESSON_LIST(state, {lessonsList}) {
        state.lessonsList = lessonsList
    },
    SET_LESSON_DETAIL(state, lessonDetail) {
        state.lessonDetail = lessonDetail
    },

    make_tree: function() {

    }
}
