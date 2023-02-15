<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <form @submit.prevent="updateForm()">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل المقال</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <div class="form-group mb-3">
                  <label for="simpleinput">العنوان</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.title"
                    required
                  />
                  <!-- <span class="text-danger" v-if="errors.title">{{
                    errors.title[0]
                  }}</span> -->
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">الصورة</label>
                  <input
                    type="file"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                    ref="file"
                    @change="selectFile"
                  />
                </div>
                <div class="form-group mb-3" style="direction: ltr">
                  <label for="example-email">المقال</label>
                  <QuillEditor
                    v-model:content="form.desc"
                    content-type="html"
                    toolbar="full"
                  />
                  <span class="text-danger" v-if="errors.image">{{
                    errors.image[0]
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
              <div class="col-md-6 text-center">
                <img :src="this.form.image" class="img-thumbnail" alt="" />
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
  name: "edit_article",
  data() {
    return {
      form: {
        title: "",
        image: "",
        desc: "",
      },
      errors: [],
      id: this.$route.params.id,
      loading: false,
    };
  },
  mounted() {
    this.article();
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
        title: "تم تعديل المقال بنجاح",
      });
    },
    async article() {
      this.loading = true;
      await axios
        .get(`/api/article/show/${this.id}`)
        .then((res) => {
          this.form = res.data.article;
        })
        .catch(() => {
          this.$router.push({ name: "error404" });
        });
      this.loading = false;
    },
    async updateForm() {
      this.loading = true;
      await axios
        .post(
          `/api/article/edit/${this.id}`,
          {
            title: this.form.title,
            image: this.form.image,
            desc: this.form.desc,
          },
          {
            headers: {
              Accept: "application/json",
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then(() => {
          this.article();
          this.alert();
        })
        .catch((error) => {
          console.log(error);
        });
      this.loading = false;
    },

    selectFile() {
      this.form.image = this.$refs.file.files[0];
    },
  },
};
</script>

<style lang="scss" scoped></style>
