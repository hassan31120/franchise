<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <!-- <h2 class="h5 page-title pb-5">إضافة عضو جديد</h2> -->

      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل العضو</strong>
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
  name: "edit_user",
  data() {
    return {
      form: {
        name: "",
        email: "",
        number: "",
      },
      errors: [],
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.user();
  },
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
        title: "تم تعديل العضو بنجاح",
      });
    },
    async user() {
      axios
        .get(`/api/user/show/${this.id}`)
        .then((res) => {
          this.form = res.data.user;
        })
        .catch(() => {
          this.$router.push({ name: "error404" });
        });
    },
    async saveForm() {
      axios
        .post(`/api/user/edit/${this.id}`, this.form)
        .then(() => {
          this.user();
          this.alert();
          this.errors = [];
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style></style>
