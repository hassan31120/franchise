<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">إضافة فرصة جديدة</h2>

      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">إضافة فرصة جديدة</strong>
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
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="desc">الوصف</label>
                  <textarea
                    name="desc"
                    id="desc"
                    cols="30"
                    rows="8"
                    class="form-control"
                    v-model="form.desc"
                  ></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">اللوجو</label>
                  <input
                    type="file"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                    ref="logo"
                    @change="selectLogo"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">عدد الفروع</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.branches"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">منافذ الامتياز</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.outlets"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">القسم</label>
                  <select v-model="form.cat_id" class="form-control">
                    <option :value="cat.id" v-for="cat in cats" :key="cat.id">
                      {{ cat.name }}
                    </option>
                  </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- <img src="@/assets/UsabilityTesting.gif" alt="" /> -->
                <div class="form-group mb-3">
                  <label for="simpleinput">معلومات مانح الإمتياز</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.provider"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الرقم</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.number"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">الإيميل</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.email"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">اللينك</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.link"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="example-email">الصور</label>
                  <input
                    type="file"
                    id="example-email"
                    name="example-email"
                    class="form-control"
                    ref="images"
                    @change="selectImages"
                    multiple
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">المسؤول عن المتقدمين</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.resp"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">السعر</label>
                  <input
                    type="text"
                    id="simpleinput"
                    class="form-control"
                    v-model="form.price"
                  />
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">البلد</label>
                  <select v-model="form.country_id" class="form-control">
                    <option
                      :value="country.id"
                      v-for="country in countries"
                      :key="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </select>
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
                تأكيد
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
  name: "add_chance",
  data() {
    return {
      form: {
        title: "",
        desc: "",
        logo: "",
        branches: "",
        outlets: "",
        provider: "",
        email: "",
        link: "",
        number: "",
        resp: "",
        price: "",
        country_id: "",
        cat_id: "",
        images: [],
      },
      errors: [],
      cats: [],
      countries: [],
    };
  },
  mounted() {
    this.fetchCats();
    this.fetchCountries();
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
        title: "تم إضافة فرصة الامتياز بنجاح",
      });
    },
    async saveForm() {
      axios
        .post(`api/chance/add`, this.form, {
          headers: {
            Accept: "application/json",
            "Content-Type": "multipart/form-data",
          },
        })
        .then(() => {
          (this.form.title = ""),
            (this.form.desc = ""),
            (this.form.logo = ""),
            (this.form.branches = ""),
            (this.form.outlets = ""),
            (this.form.provider = ""),
            (this.form.email = ""),
            (this.form.link = ""),
            (this.form.number = ""),
            (this.form.resp = ""),
            (this.form.price = ""),
            (this.form.country_id = ""),
            (this.form.cat_id = "");
          this.$router.push({ name: "chances" });
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.message;
          console.log(error);
        });
    },

    async fetchCountries() {
      axios
        .get(`api/countries`)
        .then((res) => {
          this.countries = res.data.countries;
        })
        .catch(() => {
          this.$router.push({ name: "error500" });
        });
    },

    async fetchCats() {
      axios
        .get(`api/cats`)
        .then((res) => {
          this.cats = res.data.cats;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
    },

    selectLogo() {
      this.form.logo = this.$refs.logo.files[0];
    },

    selectImages() {
      this.form.images = this.$refs.images.files;
    },
  },
};
</script>

<style></style>
