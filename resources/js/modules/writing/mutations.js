import defaultState from "./state"


export default {
    SET_EXERCISE(state, {question, checkedExercise, isDone, oldExercise}) {
        state.checkedExercise = checkedExercise
        state.isDone          = isDone
        state.question        = question,
        state.oldExercise     = oldExercise
    },
    SET_OLD_EXERCISE(state, {oldExercise}) {
        state.oldExercise = oldExercise
    },
}
