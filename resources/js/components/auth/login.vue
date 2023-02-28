<template>
  <div class="wrapper vh-100" style="overflow: hidden">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="row align-items-center h-100 d-flex justify-content-center">
      <!-- ./col -->
      <div class="col-lg-6">
        <div class="w-50 mx-auto">
          <form @submit.prevent="saveForm" class="mx-auto text-center">
            <router-link
              class="navbar-brand mx-auto mt-2 flex-fill text-center"
              :to="{ name: 'home' }"
              style="margin-bottom: 50px;"
            >
              <img class="logo" src="@/assets/new.png" alt="logo" style="width: 360px" />
            </router-link>
            <div class="form-group">
              <input
                type="email"
                class="form-control form-control-lg"
                placeholder="البريد الإلكتروني"
                required=""
                autofocus=""
                v-model="form.email"
                style="border-radius: 10px"
              />
              <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
            </div>
            <div class="form-group">
              <input
                type="password"
                class="form-control form-control-lg"
                placeholder="كلمة المرور"
                required=""
                v-model="form.password"
                style="border-radius: 10px"
              />
              <span class="text-danger" v-if="errors.password">{{
                errors.password[0]
              }}</span>
            </div>
            <button
              class="btn btn-lg btn-block text-white"
              style="background-color: #ff7c00; border-radius: 10px"
              type="submit"
            >
              تسجيل الدخول
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
    return {
      form: {
        email: "",
        password: "",
      },
      errors: [],
      loading: false,
    };
  },

  methods: {
    async saveForm() {
      this.loading = true;
      await axios
        .post(`api/dashLogin`, this.form)
        .then(() => {
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
      this.loading = false;
    },
  },
};
</script>

<style scoped>
@media only screen and (max-width: 992px) {
  .logo {
    width: 180px !important;
  }
}
</style>
