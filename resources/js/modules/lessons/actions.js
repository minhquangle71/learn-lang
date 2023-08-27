import lessonApi from "../../request/lessonApi";

export default {
    getLessonList: ({comit}) => {
        lessonApi.lessonList((response) => {
            console.log(response)
        }, (response) => {

        })
    }
}
