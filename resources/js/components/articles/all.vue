<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <h2 class="h5 page-title pb-5">كل المقالات</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">الصورة</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(article, index) in articles" :key="article.id">
            <td scope="row">{{ index + 1 }}</td>
            <td>{{ article.title }}</td>
            <td>
              <img :src="article.image" width="100" height="66.72" alt="" />
            </td>
            <td class="actions">
              <router-link :to="{ name: 'edit_article', params: { id: article.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delarticle(article.id)">
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
  name: "articles",
  data() {
    return {
      articles: [],
      loading: false,
    };
  },
  mounted() {
    this.fetcharticles();
  },
  methods: {
    delarticle(id) {
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
            axios.post(`api/article/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetcharticles();
          }
        });
    },
    async fetcharticles() {
      this.loading = true;
      await axios
        .get(`api/articles`)
        .then((res) => {
          this.articles = res.data.articles;
        })
        .catch(() => {
          this.$router.push({ name: "error500" });
        });
      this.loading = false;
    },
  },
};
</script>

<style></style>
