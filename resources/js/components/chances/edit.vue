<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <!-- <h2 class="h5 page-title pb-5">إضافة فرصة جديدة</h2> -->

      <form @submit.prevent="saveForm">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">تعديل الفرصة</strong>
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
                    rows="10"
                    class="form-control"
                    v-model="form.desc"
                    required
                  ></textarea>
                  <span class="text-danger" v-if="errors.desc">{{ errors.desc[0] }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="logo">الشعار</label>
                  <input
                    type="file"
                    id="logo"
                    name="logo"
                    class="form-control"
                    ref="logo"
                    @change="selectLogo"
                  />
                  <span
                    style="width: 100px; height: 62px: position: relative;"
                    class="delImage mt-2"
                  >
                    <img
                      class="ml-2 mt-2"
                      :src="form.logo"
                      alt="image"
                      width="100"
                      height="62"
                    />
                  </span>
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
                  <label for="city">المدينة</label>
                  <input type="text" id="city" class="form-control" v-model="form.city" />
                  <span class="text-danger" v-if="errors.city">{{ errors.city[0] }}</span>
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
                  <label for="cat_id">النشاط التجاري</label>
                  <select
                    v-model="form.cat_id"
                    class="form-control pt-0"
                    id="cat_id"
                    required
                  >
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
                  <label for="provider">معلومات مانح الامتياز</label>
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
                  <label for="number">رقم الجوال</label>
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
                  <label for="email">البريد الإلكتروني</label>
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
                  <label for="link">الرابط</label>
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
                  />
                  <span
                    v-for="image in form.images"
                    :key="image"
                    style="width: 100px; height: 62px: position: relative;"
                    class="delImage mt-2"
                  >
                    <img
                      class="ml-2 mt-2"
                      :src="image.image"
                      alt="image"
                      width="100"
                      height="62"
                    />
                    <button type="button" class="mt-2" @click="delImage(image.id)">
                      <i class="fe fe-x-square fe-16 text-danger"></i>
                    </button>
                  </span>
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
                <div class="row">
                  <div class="form-group mb-3 col-6">
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
                  <div class="form-group mb-3 col-6">
                    <label for="currency">العملة</label>
                    <input
                      type="text"
                      id="currency"
                      class="form-control"
                      v-model="form.currency"
                    />
                    <span class="text-danger" v-if="errors.currency">{{
                      errors.currency[0]
                    }}</span>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="governorate">المحافظة</label>
                  <input
                    type="text"
                    id="governorate"
                    class="form-control"
                    v-model="form.governorate"
                  />
                  <span class="text-danger" v-if="errors.governorate">{{
                    errors.governorate[0]
                  }}</span>
                </div>
                <div class="form-group mb-3">
                  <label for="country_id">الدولة</label>
                  <select
                    v-model="form.country_id"
                    class="form-control pt-0"
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
  name: "edit_chance",
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
        governorate: "",
        city: "",
        price: "",
        currency: "",
        cat_id: "",
        country_id: "",
        images: [],
      },
      errors: [],
      cats: [],
      countries: [],
      id: this.$route.params.id,
      loading: false,
    };
  },
  mounted() {
    this.fetchCat();
    this.fetchCountries();
    this.fetchChance();
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
        title: "تم تعديل فرصة الامتياز بنجاح",
      });
    },
    delImage(id) {
      this.$swal
        .fire({
          title: "هل انت متأكد؟",
          text: "لن تتمكن من إعادة هذه الخطوة!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "نعم إحذف",
          cancelButtonText: "الغاء",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios.post(`/api/chanceImage/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchChance();
          }
        });
    },
    async fetchChance() {
      this.loading = true;
      await axios
        .get(`/api/show/${this.id}`)
        .then((res) => {
          this.form = res.data.chance;
        })
        .catch(() => {
          this.$router.push({ name: "error404" });
        });
      this.loading = false;
    },
    async saveForm() {
      this.loading = true;
      await axios
        .post(
          `/api/chance/edit/${this.id}`,
          {
            title: this.form.title,
            desc: this.form.desc,
            logo: this.form.logo,
            branches: this.form.branches,
            outlets: this.form.outlets,
            provider: this.form.provider,
            number: this.form.number,
            resp: this.form.resp,
            price: this.form.price,
            email: this.form.email,
            link: this.form.link,
            country_id: this.form.country_id,
            cat_id: this.form.cat_id,
            images: this.form.images,
          },
          {
            headers: {
              Accept: "application/json",
              "Content-Type": "multipart/form-data",
            },
          }
        )
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
            (this.form.cat_id = ""),
            (this.$refs.logo.value = null),
            (this.$refs.images.value = null);
          this.fetchChance();
          this.alert();
        })
        .catch((error) => {
          this.errors = error.response.data.message;
          console.log(error);
        });
      this.loading = false;
    },

    async fetchCountries() {
      this.loading = true;
      await axios
        .get(`/api/countries`)
        .then((res) => {
          this.countries = res.data.countries;
        })
        .catch(() => {
          this.$router.push({ name: "error500" });
        });
      this.loading = false;
    },

    async fetchCat() {
      this.loading = true;
      await axios
        .get(`/api/cats`)
        .then((res) => {
          this.cats = res.data.cats;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
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
