<template>
    <div class="home">
        <div class="home__head" />
        <div class="home__content">
            <!-- Lesson -->
            <div class="home__content__lessons">
                <div class="row w-100 mx-auto">
                    <div :key="item.id"
                        v-for="item in lessons"
                        class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <router-link :to="`/lesson/${item.id}`">
                            <div class="card h-100">
                                <img class="card-img-top mx-auto mt-1" src="/images/thumb.jpg" width="100px" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">{{ item.name }}</h4>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <!-- Lesson -->

            <div class="clearfix" />

            <div class="w-100 mx-autohome__content__paginate text-center">
                <vue-awesome-paginate
                    :total-items="50"
                    :items-per-page="5"
                    :max-pages-shown="3"
                    v-model="currentPage"
                    :on-click="onClickHandler"
                />
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

    export default{
        mounted() {
            this.$store.dispatch('lessons/getLessonList')
        },
        data() {
            return {
                currentPage: 1
            }
        },
        computed: {
            ...mapGetters({
                lessons: 'lessons/lessonsList'
            })
        },

        methods: {
            onClickHandler: function(page) {
                this.currentPage = page
            }
        }
    }
</script>
