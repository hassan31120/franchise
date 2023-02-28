<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <h2 class="h5 page-title pb-5">إضافة عضو جديد</h2>

      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إضافة عضو جديد</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">الاسم</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.name"
                  />
                  <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="email">البريد الإلكتروني</label>
                  <input
                    type="email"
                    id="email"
                    class="form-control"
                    v-model="form.email"
                  />
                  <span class="text-danger" v-if="errors.email">{{
                    errors.email[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="number">رقم الجوال</label>
                  <input
                    type="text"
                    id="number"
                    class="form-control"
                    v-model="form.number"
                  />
                  <span class="text-danger" v-if="errors.number">{{
                    errors.number[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="password">كلمة المرور</label>
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    v-model="form.password"
                  />
                  <span class="text-danger" v-if="errors.password">{{
                    errors.password[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="example-palaceholder">تأكيد كلمة المرور</label>
                  <input
                    type="password"
                    id="example-palaceholder"
                    class="form-control"
                    v-model="form.password_confirmation"
                  />
                  <span class="text-danger" v-if="errors.password_confirmation">{{
                    errors.password_confirmation[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <div class="mb-2">نوع المسؤول</div>
                  <div style="margin-right: 17px">
                    <input
                      type="radio"
                      class="form-check-input"
                      value="superAdmin"
                      v-model="form.userType"
                    />
                    <label for="radio1" class="">super admin</label>
                  </div>
                  <div style="margin-right: 17px">
                    <input
                      type="radio"
                      name="selector"
                      class="form-check-input"
                      value="admin"
                      v-model="form.userType"
                    />
                    <label for="radio2" class="">admin</label>
                  </div>
                  <span class="text-danger" v-if="errors.userType">{{
                    errors.userType[0]
                  }}</span>
                </div>
                <button
                  type="submit"
                  class="btn"
                  style="
                    background-color: #ff7c00;
                    color: aliceblue;
                    width: 100px;
                    font-weight: 600;
                  "
                >
                  تأكيد
                </button>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <img src="@/assets/signup.gif" alt="" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
export default {
  name: "add_admin",
  data() {
    return {
      form: {
        name: "",
        email: "",
        number: "",
        password: "",
        password_confirmation: "",
        userType: "",
      },
      errors: [],
      loading: false,
    };
  },
  mounted() {},
  methods: {
    alert() {
      var toastMixin = this.$swal.mixin({
        toast: true,
        icon: "success",
        title: "General Title",
        animation: false,
        position: "top-right",
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
      });
      toastMixin.fire({
        animation: true,
        title: "تم إضافة المسؤول بنجاح",
      });
    },
    async saveForm() {
      this.loading = true;
      await axios
        .post(`api/add_admin`, this.form)
        .then(() => {
          this.$router.push({ name: "admins" });
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
      this.loading = false;
    },
  },
};
</script>

<style scoped></style>
