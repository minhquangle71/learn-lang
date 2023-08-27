<template class="header">
    <div class="header__wrapper">
      <div class="header__wrapper__item menu">
        <div class="header__wrapper__item__linee linee1"></div>
        <div class="header__wrapper__item__linee linee2"></div>
        <div class="linheader__wrapper__item__lineeee linee3"></div>
      </div>
      <div class="header__wrapper__item header__wrapper__gallery">
        <div class="header__wrapper__item__dot dot1"></div>
        <div class="header__wrapper__item__dot dot2"></div>
        <div class="header__wrapper__item__dot dot3"></div>
        <div class="header__wrapper__item__dot dot4"></div>
        <div class="header__wrapper__item__dot dot5"></div>
        <div class="header__wrapper__item__dot dot6"></div>
      </div>
      <button class="header__wrapper__item menu-add">
        <div class="header__wrapper__item__circle">
            <div class="header__wrapper__item__circle__close">
                <div class="header__wrapper__item__circle__line line1"></div>
                <div class="header__wrapper__item__circle__line line2"></div>
            </div>
        </div>
        <input type="search" placeholder="search" class="header__wrapper__item__search" />

      </button>

      <div class="header__wrapper__nav-items items1">
        <i class="fas fa-home"></i>
      </div>
      <div class="header__wrapper__nav-items items2">
        <i class="fas fa-camera"></i>
      </div>
      <div class="header__wrapper__nav-items items3">
        <i class="fas fa-folder"></i>
      </div>
      <div class="header__wrapper__nav-items items4">
        <i class="fas fa-heart"></i>
      </div>
      <div class="header__wrapper__box">
        <div class="header__wrapper__box__box-line line1"></div>
        <div class="header__wrapper__box__box-line line2"></div>
        <div class="header__wrapper__box__box-line line3"></div>
        <div class="header__wrapper__box__box-line line4"></div>
      </div>
    </div>

    <div class="header__logout"
        @click="handleClickLogout()">
        <i class="fa fa-door-open fa-2x fa-fw"></i>
    </div>

    <div class="header__effect"></div>
</template>

<script>
import { mapState } from 'vuex';

    export default {
        computed: {
            ...mapState(['users'])
        },
        methods: {
            handleClickLogout() {
                this.$store.dispatch('users/logout')
            }
        }
    }
</script>
