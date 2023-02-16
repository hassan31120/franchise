<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <form @submit.prevent="saveForm()">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل الإعدادات</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 align-self-center">
                <div class="form-group mb-3" style="direction: ltr !important">
                  <label for="about">من نحن</label>
                  <QuillEditor
                    v-model:content="form.about"
                    content-type="html"
                    toolbar="full"
                  />
                  <span class="text-danger" v-if="errors.about">{{
                    errors.about[0]
                  }}</span>
                </div>
                <div class="form-group mb-3" style="direction: ltr !important">
                  <label for="terms">الشروط والأحكام</label>
                  <QuillEditor
                    v-model:content="form.terms"
                    content-type="html"
                    toolbar="full"
                  />
                  <span class="text-danger" v-if="errors.terms">{{
                    errors.terms[0]
                  }}</span>
                </div>
                <div class="form-group mb-3" style="direction: ltr !important">
                  <label for="contact">تواصل معنا</label>
                  <QuillEditor
                    v-model:content="form.contact"
                    content-type="html"
                    toolbar="full"
                  />
                  <span class="text-danger" v-if="errors.contact">{{
                    errors.contact[0]
                  }}</span>
                </div>

                <div class="form-group mb-3" style="direction: ltr !important">
                  <label for="privacy">سياسة الخصوصية</label>
                  <QuillEditor
                    v-model:content="form.privacy"
                    content-type="html"
                    toolbar="full"
                  />
                  <span class="text-danger" v-if="errors.privacy">{{
                    errors.privacy[0]
                  }}</span>
                </div>

                <div class="form-group mb-3">
                  <label for="email">بريد الدعم</label>
                  <input type="text" v-model="form.email" class="form-control" />
                  <span class="text-danger" v-if="errors.email">{{
                    errors.email[0]
                  }}</span>
                </div>

                <div class="form-group mb-3">
                  <label for="mobile">رقم الهاتف</label>
                  <input type="text" v-model="form.mobile" class="form-control" />
                  <span class="text-danger" v-if="errors.mobile">{{
                    errors.mobile[0]
                  }}</span>
                </div>

                <div class="form-group mb-3">
                  <label for="whatsapp">رقم الواتساب</label>
                  <input type="text" v-model="form.whatsapp" class="form-control" />
                  <span class="text-danger" v-if="errors.whatsapp">{{
                    errors.whatsapp[0]
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
        email: "",
        mobile: "",
        whatsapp: "",
      },
      errors: [],
      loading: false,
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
      this.loading = true;
      await axios
        .post(`/api/setting/edit`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          this.$router.push({ name: "about" });
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
      this.loading = false;
    },

    async fetchSettings() {
      this.loading = true;
      await axios
        .get(`/api/settings`)
        .then((res) => {
          this.form = res.data.setting;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },
  },
};
</script>

<style></style>
