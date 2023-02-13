<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <h2 class="h5 page-title pb-5">كل الأنشطة التجارية</h2>

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
            <td class="actions">
              <router-link :to="{ name: 'edit_cat', params: { id: cat.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delCat(cat.id)">
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
import axios from "axios";

export default {
  name: "cats",
  data() {
    return {
      cats: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchCats();
  },
  methods: {
    delCat(id) {
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
            axios.post(`api/cat/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchCats();
          }
        });
    },

    async fetchCats() {
      this.loading = true;
      await axios
        .get(`api/cats`)
        .then((res) => {
          this.cats = res.data.cats;
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
