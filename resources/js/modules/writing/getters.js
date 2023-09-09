export default {
    isDone           : state => state.isDone,
    question         : state => state.question,
    checkedExercise  : state => state.checkedExercise,
    oldExercise      : state => state.oldExercise,
    currentQuestionId: state => state.question.id ?? null
}
