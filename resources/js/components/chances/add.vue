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
                  <label for="title">العنوان</label>
                  <input
                    type="text"
                    id="title"
                    class="form-control"
                    v-model="form.title"
                    required
                  />
                  <span class="text-danger" v-if="errors.title">{{
                    errors.title[0]
                  }}</span>
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
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.desc">{{ errors.desc[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="logo">اللوجو</label>
                  <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control"
                    ref="logo"
                    @change="selectLogo"
                    required
                  />
                  <span class="text-danger" v-if="errors.logo">{{ errors.logo[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="branches">عدد الفروع</label>
                  <input
                    type="text"
                    id="branches"
                    class="form-control"
                    v-model="form.branches"
                    required
                  />
                  <span class="text-danger" v-if="errors.branches">{{
                    errors.branches[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="outlets">منافذ الامتياز</label>
                  <input
                    type="text"
                    id="outlets"
                    class="form-control"
                    v-model="form.outlets"
                    required
                  />
                  <span class="text-danger" v-if="errors.outlets">{{
                    errors.outlets[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="cat_id">القسم</label>
                  <select v-model="form.cat_id" class="form-control" id="cat_id" required>
                    <option :value="cat.id" v-for="cat in cats" :key="cat.id">
                      {{ cat.name }}
                    </option>
                  </select>
                  <span class="text-danger" v-if="errors.cat_id">{{
                    errors.cat_id[0]
                  }}</span>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- <img src="@/assets/UsabilityTesting.gif" alt="" /> -->
                <div class="form-group mb-3">
                  <label for="provider">معلومات مانح الإمتياز</label>
                  <input
                    type="text"
                    id="provider"
                    class="form-control"
                    v-model="form.provider"
                    required
                  />
                  <span class="text-danger" v-if="errors.provider">{{
                    errors.provider[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="number">الرقم</label>
                  <input
                    type="text"
                    id="number"
                    class="form-control"
                    v-model="form.number"
                    required
                  />
                  <span class="text-danger" v-if="errors.number">{{
                    errors.number[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="email">الإيميل</label>
                  <input
                    type="text"
                    id="email"
                    class="form-control"
                    v-model="form.email"
                    required
                  />
                  <span class="text-danger" v-if="errors.email">{{
                    errors.email[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="link">اللينك</label>
                  <input
                    type="text"
                    id="link"
                    class="form-control"
                    v-model="form.link"
                    required
                  />
                  <span class="text-danger" v-if="errors.link">{{ errors.link[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="images">الصور</label>
                  <input
                    type="file"
                    id="images"
                    name="images"
                    class="form-control"
                    ref="images"
                    @change="selectImages"
                    multiple
                    required
                  />
                  <span class="text-danger" v-if="errors.images">{{
                    errors.images[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="resp">المسؤول عن المتقدمين</label>
                  <input type="text" id="resp" class="form-control" v-model="form.resp" />
                  <span class="text-danger" v-if="errors.title">{{
                    errors.title[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="price">السعر</label>
                  <input
                    type="text"
                    id="price"
                    class="form-control"
                    v-model="form.price"
                  />
                  <span class="text-danger" v-if="errors.price">{{
                    errors.price[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="country_id">البلد</label>
                  <select
                    v-model="form.country_id"
                    class="form-control"
                    id="country_id"
                    required
                  >
                    <option
                      :value="country.id"
                      v-for="country in countries"
                      :key="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </select>
                  <span class="text-danger" v-if="errors.country_id">{{
                    errors.country_id[0]
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
          console.log(error.response.data.message);
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
