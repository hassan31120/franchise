<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل الفرص</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">اللوجو</th>
            <th scope="col">عدد الفروع</th>
            <th scope="col">السعر</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(chance, index) in chances" :key="chance.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ chance.title }}</td>
            <td>
              <img :src="chance.logo" width="100" height="66.72" alt="" />
            </td>
            <td>{{ chance.branches }}</td>
            <td>{{ chance.price }}</td>
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
  name: "chances",
  data() {
    return {
      chances: [],
    };
  },
  mounted() {
    this.fetchChance();
  },
  methods: {
    async fetchChance() {
      axios
        .get(`api/myCahnces`)
        .then((res) => {
          this.chances = res.data.chances;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
    },
  },
};
</script>

<style></style>
