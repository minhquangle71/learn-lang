<template>
    <div class="lesson">
        <div class="lesson__head" />
        <div class="lesson__content row w-100 mx-auto">
            <div class="card col-md-4 col-12 mx-auto">
              <img class="card-img-top mt-3" src="https://placehold.co/400" height="200" alt="">
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
                        :nodes="nodes"
                        :search-text="searchText"
                        :use-icon="true"
                        use-row-delete
                        show-child-count
                        @nodeExpanded="onNodeExpanded"
                        @update:nodes="onUpdate"
                        @nodeClick="onNodeClick"
                    />
                </div>
            </div>


            <div class="col-12 text-center mt-3 d-flex justify-content-around">
                <router-link to="/">
                        <div class="btn btn-warning lesson__content__button text-white">Return</div>
                </router-link>
                <div class="btn btn-primary lesson__content__button">Learn</div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import Tree from "vue3-tree";

    export default {
        components: {
            Tree
        },
        data: function () {
            return {
                nodes: ref([
                    {
                        id: 1,
                        label: "Animal",
                        nodes: [
                        {
                            id: 2,
                            label: "Dog",
                        },
                        {
                            id: 3,
                            label: "Cat",
                            nodes: [
                            {
                                id: 4,
                                label: "Egyptian Mau Cat",
                            },
                            {
                                id: 5,
                                label: "Japanese Bobtail Cat",
                            },
                            ],
                        },
                        ],
                    },
                    {
                        id: 6,
                        label: "People",
                    },
                ]),
                searchText: ref(''),
            }
        },
        methods: {
            onNodeExpanded: (node, state) => {
                console.log("state: ", state);
                console.log("node: ", node);
            },
            onUpdate: (nodes) => {
                console.log("nodes:", nodes);
            },
            onNodeClick: (node) => {
                console.log(node);
            }
        }
    }
</script>
