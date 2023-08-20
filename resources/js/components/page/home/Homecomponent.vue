<template>
    <div class="home">
        <div class="home__head" />
        <div class="home__content">
            <!-- Lesson -->
            <div class="home__content__lessons">
                <div class="row w-100 mx-auto">
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2 home__content__lessons__thumb">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Title</h4>
                                <p class="card-text">Text</p>
                            </div>
                        </div>
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

    export default{
        data() {
            return {
                currentPage: 1
            }
        },

        methods: {
            onClickHandler: function(page) {
                this.currentPage = page
            }
        }
    }
</script>
