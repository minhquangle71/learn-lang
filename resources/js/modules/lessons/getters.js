import { ref } from "vue";

export default {
    lessonsList: state => state.lessonsList,
    lessonDetail: state => state.lessonDetail,
    nodes: state => state.lessonDetail.nodes
}
