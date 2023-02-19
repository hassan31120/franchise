<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <h2 class="h5 page-title pb-5">كل الطلبات</h2>
      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفرصة</th>
            <th scope="col">اللوجو</th>
            <th scope="col">المستخدم</th>
            <th scope="col">رقم المستخدم</th>
            <th scope="col">منذ</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(order, index) in orders" :key="order.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>
              <router-link
                :to="{ name: 'show_chance', params: { id: order.chance_id } }"
                >{{ order.chance_title }}</router-link
              >
            </td>
            <td><img :src="order.chance_logo" height="66" width="100" alt="logo" /></td>
            <td>{{ order.user_name }}</td>
            <td>{{ order.user_number }}</td>
            <td>{{ order.created_at }}</td>
            <td class="actions">
              <button type="button" @click="delorder(order.id)">
                <i class="fe fe-trash fe-16"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- pagination -->
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li
            class="page-item"
            v-for="link in pagination.links"
            :key="link"
            v-bind:class="[{ disabled: !link.url }, { haha: link.active }]"
          >
            <a
              class="page-link"
              href="#"
              v-html="link.label"
              @click="fetchorders(link.url)"
            ></a>
          </li>
        </ul>
      </nav>
    </div>
  </main>
</template>

<script>
export default {
  name: "orders",
  data() {
    return {
      orders: [],
      loading: false,
      pagination: {},
    };
  },
  mounted() {
    this.fetchorders();
  },
  methods: {
    delorder(id) {
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
            axios.post(`api/order/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchorders();
          }
        });
    },

    async fetchorders(page_url) {
      this.loading = true;
      page_url = page_url || `api/orders`;
      await axios
        .get(page_url)
        .then((res) => {
          this.orders = res.data.data;
          this.makePagination(res.data.meta);
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },

    async makePagination(meta) {
      let pagination = {
        links: meta.links,
      };
      this.pagination = pagination;
    },
  },
};
</script>

<style></style>
