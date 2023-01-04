<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل البلاد</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">الصورة</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(country, index) in countries" :key="country.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ country.name }}</td>
            <td>
              <img :src="country.image" width="100" height="66.72" alt="" />
            </td>
            <td style="position: relative; text-align: center">
              <i class="fe fe-edit fe-16"></i>
              <i class="fe fe-trash fe-16" style="position: absolute; right: 5px"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<script>
export default {
  name: "countries",
  data() {
    return {
      countries: [],
    };
  },
  mounted() {
    this.fetchCountries();
  },
  methods: {
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
  },
};
</script>

<style></style>
