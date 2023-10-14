<template>
    <div class="auth-screen" id="login">
        <div class="auth-screen__main-content bounce-in-top">
            <div class="auth-screen__title">Login</div>

            <div class="auth-screen__form">
              <div class="form-group">
                <label for="">Email</label>
                <input v-model="email"
                        type="text"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="">Password</label>
                <input  v-model="password"
                        type="password"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId">
              </div>
            </div>


            <div class="auth-screen__button row text-center">
                <div class="col-md-6">
                  <button class="btn btn-outline-primary w-75"
                    @click="handleLogin()">Submit</button>
                </div>
                <div class="col-md-6">
                    <router-link to="/register">
                        <div class="btn btn-outline-danger w-75">
                            Register
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    data() {
        return {
            email: '',
            password: ''
        }
    },

    computed: {
        ...mapState(['users'])
    },

    methods: {
        handleLogin () {
            let data = {};
            data.email = this.email
            data.password = this.password

            this.$store.dispatch('users/login', data)
        }
    }

}
</script>
