<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
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
            <td>
              <router-link :to="{ name: 'show_chance', params: { id: chance.id } }">{{
                chance.title
              }}</router-link>
            </td>
            <td>
              <img :src="chance.logo" width="100" height="66.72" alt="" />
            </td>
            <td>{{ chance.branches }}</td>
            <td>{{ chance.price }}</td>
            <td class="actions">
              <router-link :to="{ name: 'edit_chance', params: { id: chance.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delChance(chance.id)">
                <i class="fe fe-trash fe-16"></i>
              </button>
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
      loading: false,
    };
  },
  mounted() {
    this.fetchChance();
  },
  methods: {
    delChance(id) {
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
            axios.post(`api/chance/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchChance();
          }
        });
    },
    async fetchChance() {
      this.loading = true;
      await axios
        .get(`api/myCahnces`)
        .then((res) => {
          this.chances = res.data.chances;
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
