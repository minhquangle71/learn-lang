// App.vue

<template>
    <div>

        <router-view v-slot="{ Component, route }">
            <template v-if="!['/login', '/register'].includes(route.path)">
                <Menu />
            </template>
            <transition name="fade">
                <component :is="Component" :key="route.path" />
            </transition>
        </router-view>
    </div>
  </template>

<style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>

<script>
import Menu from "./components/common/Menu.vue";

    export default{
        components: {
            Menu,
        }
    }
</script>
