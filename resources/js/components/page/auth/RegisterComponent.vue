<template>
    <div class="auth-screen" id="register">
        <div class="auth-screen__main-content bounce-in-right">
            <div class="auth-screen__title">Register</div>

            <div class="auth-screen__form">
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>

              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            </div>

            <div class="auth-screen__button row text-center">
                <div class="col-md-6">
                  <div class="btn btn-outline-primary w-75">Submit</div>
                </div>
                <div class="col-md-6">
                    <router-link to="/login">
                        <div class="btn btn-outline-danger w-75">
                            Login
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>
