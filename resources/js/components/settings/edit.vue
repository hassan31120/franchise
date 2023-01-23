<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">إرسال edit جديد</h2>

      <form @submit.prevent="saveForm()">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إرسال إشعار جديد</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="about">معلومات عنا</label>
                  <textarea
                    class="form-control"
                    id="about"
                    cols="30"
                    rows="8"
                    v-model="form.about"
                  ></textarea>
                  <span class="text-danger" v-if="errors.about">{{
                    errors.about[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="terms">الشروط والأحكام</label>
                  <textarea
                    class="form-control"
                    id="terms"
                    cols="30"
                    rows="8"
                    v-model="form.terms"
                  ></textarea>
                  <span class="text-danger" v-if="errors.terms">{{
                    errors.terms[0]
                  }}</span>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="contact">تواصل معنا</label>
                  <textarea
                    class="form-control"
                    id="contact"
                    cols="30"
                    rows="8"
                    v-model="form.contact"
                  ></textarea>
                  <span class="text-danger" v-if="errors.contact">{{
                    errors.contact[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="privacy">سياسة الخصوصية</label>
                  <textarea
                    class="form-control"
                    id="privacy"
                    cols="30"
                    rows="8"
                    v-model="form.privacy"
                  ></textarea>
                  <span class="text-danger" v-if="errors.privacy">{{
                    errors.privacy[0]
                  }}</span>
                </div>
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
                حفظ
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
export default {
  name: "edit_settings",
  data() {
    return {
      form: {
        about: "",
        terms: "",
        contact: "",
        privacy: "",
      },
      errors: [],
    };
  },
  mounted() {
    this.fetchSettings();
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
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", this.$swal.stopTimer);
          toast.addEventListener("mouseleave", this.$swal.resumeTimer);
        },
      });
      toastMixin.fire({
        animation: true,
        title: "تم تعديل الإعدادات بنجاح",
      });
    },
    async saveForm() {
      await axios
        .post(`/api/setting/edit`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          this.$router.push({ name: "settings" });
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    async fetchSettings() {
      await axios
        .get(`/api/settings`)
        .then((res) => {
          this.form = res.data.setting;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
    },
  },
};
</script>

<style></style>
