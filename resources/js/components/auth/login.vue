<template>
  <div class="wrapper vh-100" style="overflow: hidden">
    <div class="row align-items-center h-100 d-flex justify-content-center">
      <!-- ./col -->
      <div class="col-lg-6">
        <div class="w-50 mx-auto">
          <form @submit.prevent="saveForm" class="mx-auto text-center">
            <a
              class="navbar-brand mx-auto mt-2 flex-fill text-center"
              href="./index.html"
            >
              <img src="@/assets/new.png" alt="" style="width: 300px" />
            </a>
            <div class="form-group">
              <input
                type="email"
                class="form-control form-control-lg"
                placeholder="الإيميل"
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
                placeholder="الرقم السري"
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
    };
  },

  methods: {
    saveForm() {
      axios
        .post(`api/dashLogin`, this.form)
        .then(() => {
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          this.errors = error.response.data;
        });
    },
  },
};
</script>

<style></style>
