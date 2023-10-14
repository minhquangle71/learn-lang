<template>
    <div class="lesson">
        <div class="lesson__head" />
        <div class="lesson__content row w-100 mx-auto">
            <div class="card col-md-4 col-12 mx-auto">
              <img class="card-img-top mt-3" src="/images/thumb_1.png" width="400px" alt="">
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
              </div>
            </div>
            <div class="row mx-auto">
                <div class="col-12">
                    <div class="form-group">
                      <label for=""></label>
                      <input
                        v-model="searchText"
                        type="text"
                        class="form-control" placeholder="Search...">
                    </div>

                    <Tree
                        v-if="nodes_test"
                        :nodes="nodes_test"
                        :search-text="searchText"
                        :use-icon="true"
                        @nodeClick="onNodeClick"
                    />
                </div>
            </div>

            <div class="text-center mt-3 mb-2 d-flex justify-content-around">
                <router-link to="/">
                        <div class="btn btn-warning lesson__content__button text-white">Return</div>
                </router-link>
                <router-link :disabled="disabled_learn"
                    :class="disabled_learn ? 'btn-dark' : 'btn-primary'"
                    :to="`/lesson/${lessonId}/writing/${current_node}`"
                    class="btn lesson__content__button">Learn</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import Tree from "vue3-tree";
import { mapGetters } from "vuex";

    export default {
        components: {
            Tree
        },
        mounted: function() {
            this.lessonId = this.$route.params.id
            if (this.lessonId) {
                this.loading = true
                let self = this
                this.$store.dispatch('lessons/getLessonDetail', { id: this.lessonId }, () => {
                    self.loading = false
                })
            }
        },
        data: function () {
            let disabled_learn = true
            let current_node = 0
            const onNodeClick = (node) => {
                if (node.total_exercises) {
                    this.disabled_learn = false
                    this.current_node = node.id
                } else {
                    this.disabled_learn = true
                    this.current_node = 0
                }
            }

            return {
                searchText: ref(''),
                loading: false,
                onNodeClick,
                disabled_learn,
                current_node,
                lessonId: null,
            }
        },
        computed: {
            ...mapGetters({
                nodes_test: 'lessons/nodes'
            })
        },
    }
</script>
