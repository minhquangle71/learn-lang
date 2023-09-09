<template>
       <div class="writing">
        <div class="writing__head" />
        <div class="writing__content row w-100 mx-auto">
            <div class="writing__content__question card col-md-5 col-12 mx-auto">
              <img class="card-img-top mt-3 mx-auto" src="/images/thumb.jpg" alt="">
              <div v-if="!isDone"
                class="card-body">
                <template v-if="oldExercise == null">
                    <h4 class="card-title">Question</h4>
                    <p class="card-text">{{ question.mean }}</p>
                    <p class="card-text">({{ question.romaji }})</p>
                </template>
                <template v-else>
                    <h4 class="card-title">{{ checkedExercise == true ? 'Success' : 'Fail' }}</h4>
                    <p class="card-text">{{ oldExercise.mean }}</p>
                    <p class="card-text">({{ oldExercise.romaji }})</p>
                    <p :class="checkedExercise ? 'text-success' : 'text-red'"
                        class="card-text">Result: {{ oldExercise.original }}</p>
                </template>
              </div>
              <div v-else
                class="card-body">
                <div class="alert alert-success" role="alert">
                    <strong>Learning Done</strong>
                </div>
              </div>
            </div>
            <div class="writing__content__answer row mx-auto mt-2">
                <template v-if="!isDone">
                    <div class="col-12 mx-auto">
                        <div :class="oldExercise === null ? '' : 'd-none'"
                            class="form-group w-50 mx-auto">
                          <label for="answer">Answer</label>
                          <input v-model="params.answer"
                            type="text"
                            id="answer"
                            class="form-control">
                        </div>
                    </div>
                    <div class="col-6 mx-auto d-flex text-center justify-content-around">
                        <div :disabled="!params.answer.length"
                            :class="[!params.answer.length ? 'btn-dark' : 'btn-success', oldExercise === null ? '' : 'd-none']"
                            class="btn lesson__content__button"
                            @click="clickSubmitAnswer()">OK</div>
                        <div :class="oldExercise ? '' : 'd-none'"
                            class="btn btn-primary lesson__content__button"
                            @click="clickContinue()">
                            Continue
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="col-6 mx-auto d-flex text-center justify-content-around">
                        <router-link :to="`/lesson/${lessonId}`">
                                <div class="btn btn-success lesson__content__button">Return</div>
                        </router-link>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

    export default {
        data: function() {
            return {
                params: {
                    isInit: true,
                    nodeId: 0,
                    answer: '',
                    currentId: 0
                },
                lessonId: null
            }
        },
        mounted: function() {
            let nodeId = this.$route.params.nodeId
            this.lessonId = this.$route.params.lessonId
            if (nodeId) {
                this.params.nodeId = nodeId;
                this.params.callback = () => {
                    self.loading       = false
                    self.params.isInit = false
                }

                this.loading = true
                let self = this
                this.$store.dispatch('writing/getQuestion', this.params)
            }
        },
        computed: {
            ...mapGetters({
                isDone: 'writing/isDone',
                question: 'writing/question',
                checkedExercise: 'writing/checkedExercise',
                oldExercise: 'writing/oldExercise',
                currentQuestionId: 'writing/currentQuestionId'
            })
        },
        methods: {
            clickSubmitAnswer: function() {
                this.loading = true
                this.params.currentId = this.currentQuestionId
                let self = this
                this.params.callback = () => {
                    self.loading = false
                    self.params.answer = ''
                }
                this.$store.dispatch('writing/getQuestion', this.params)
            },
            clickContinue: function() {
                this.$store.commit('writing/SET_OLD_EXERCISE', {oldExercise: null})
            }
        }
    }
</script>
