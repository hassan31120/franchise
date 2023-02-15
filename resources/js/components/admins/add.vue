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
                  <label for="simpleinput">الإسم</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.name"
                  />
                  <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">الإيميل</label>
                  <input
                    type="email"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                    v-model="form.email"
                  />
                  <span class="text-danger" v-if="errors.email">{{
                    errors.email[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">رقم الهاتف</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.number"
                  />
                  <span class="text-danger" v-if="errors.number">{{
                    errors.number[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="example-password">الرقم السري</label>
                  <input
                    type="password"
                    id="example-password"
                    class="form-control"
                    v-model="form.password"
                  />
                  <span class="text-danger" v-if="errors.password">{{
                    errors.password[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="example-palaceholder">تأكيد الرقم السري</label>
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
                  <div>نوع المسؤول</div>
                  <div class="hahaa">
                    <div class="selector">
                      <div class="selecotr-item">
                        <input
                          type="radio"
                          id="radio1"
                          name="selector"
                          class="selector-item_radio"
                          value="superAdmin"
                          v-model="form.userType"
                        />
                        <label for="radio1" class="selector-item_label"
                          >super admin</label
                        >
                      </div>
                      <div class="selecotr-item">
                        <input
                          type="radio"
                          id="radio2"
                          name="selector"
                          class="selector-item_radio"
                          value="admin"
                          v-model="form.userType"
                        />
                        <label for="radio2" class="selector-item_label">admin</label>
                      </div>
                    </div>
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

<style scoped>
.hahaa {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.selector {
  position: relative;
  width: 100%;
  background-color: var(--smoke-white);
  height: 80px;
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.selecotr-item {
  position: relative;
  flex-basis: calc(70% / 3);
  height: 90%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.selector-item_radio {
  appearance: none;
  display: none;
}
.selector-item_label {
  position: relative;
  height: 80%;
  width: 100%;
  text-align: center;
  border-radius: 9999px;
  line-height: 400%;
  font-weight: 900;
  transition-duration: 0.5s;
  transform: none;
  margin: 0;
}
.selector-item_radio:checked + .selector-item_label {
  background-color: #ff7c00;
  color: var(--white);
  transform: translateY(-2px);
}
@media (max-width: 480px) {
  .selector {
    width: 90%;
  }
}
</style>
