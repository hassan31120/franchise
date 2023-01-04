<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل الأقسام</h2>

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
          <tr v-for="(cat, index) in cats" :key="cat.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ cat.name }}</td>
            <td>
              <img :src="cat.image" width="100" height="70" alt="" />
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
  name: "cats",
  data() {
    return {
      cats: [],
    };
  },
  mounted() {
    this.fetchCats();
  },
  methods: {
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
  },
};
</script>

<style></style>
