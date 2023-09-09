import { createStore } from "vuex";
import users from "../modules/users";
import lessons from "../modules/lessons";
import writing from "../modules/writing";

export default createStore({
    modules: {
        users: users,
        lessons: lessons,
        writing: writing,
    }
})
