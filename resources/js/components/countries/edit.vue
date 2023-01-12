<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <!-- <h2 class="h5 page-title pb-5">إضافة بلد جديد</h2> -->

      <form @submit.prevent="updateForm()">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل البلد</strong>
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
                    required
                  />
                  <!-- <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span> -->
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
  name: "edit_country",
  data() {
    return {
      form: {
        name: "",
        image: "",
      },
      errors: [],
      id: this.$route.params.id,
    };
  },
  mounted() {
    this.country();
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
        title: "تم تعديل البلد بنجاح",
      });
    },
    async country() {
      axios
        .get(`/api/country/show/${this.id}`)
        .then((res) => {
          this.form = res.data.country;
        })
        .catch(() => {
          this.$router.push({ name: "error404" });
        });
    },
    async updateForm() {
      axios
        .post(
          `/api/country/edit/${this.id}`,
          {
            name: this.form.name,
            image: this.form.image,
          },
          {
            headers: {
              Accept: "application/json",
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then(() => {
          this.country();
          this.alert();
        })
        .catch((error) => {
          console.log(error);
        });
    },

    selectFile() {
      this.form.image = this.$refs.file.files[0];
    },
  },
};
</script>

<style lang="scss" scoped></style>
