<template>
  <div class="wrapper vh-100" style="overflow: hidden;">
    <div class="row align-items-center h-100">
      <div class="col-lg-6 d-lg-flex" style="width: 100%; height: 100%;">
        <img src="@/assets/login.png" alt="" style="">
      </div>
      <!-- ./col -->
      <div class="col-lg-6">
        <div class="w-50 mx-auto">
          <form class="mx-auto text-center">
            <a
              class="navbar-brand mx-auto mt-2 flex-fill text-center"
              href="./index.html"
            >
              <img src="@/assets/faf.png" alt="" style="width: 300px;">
            </a>
            <h1 class="h6 mb-3">تسجيل الدخول</h1>
            <div class="form-group">
              <input
                type="email"
                id="inputEmail"
                class="form-control form-control-lg"
                placeholder="الإيميل"
                required=""
                autofocus=""
              />
            </div>
            <div class="form-group">
              <input
                type="password"
                id="inputPassword"
                class="form-control form-control-lg"
                placeholder="الرقم السري"
                required=""
              />
            </div>
            <!-- <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me" /> Stay logged in
              </label>
            </div> -->
            <button class="btn btn-lg btn-block text-white" style="background-color: #ff7c00;" type="submit">
              أدخلني!
            </button>
          </form>
        </div>
        <!-- .card -->
      </div>
      <!-- ./col -->
    </div>
    <!-- .row -->
  </div>
</template>

<script>
export default {
  name: "login",
  data() {
    return {};
  },
};
</script>

<style></style>
