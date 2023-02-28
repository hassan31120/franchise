<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <div v-if="loading">
        <div><loadingPage /></div>
      </div>
      <h2 class="h5 page-title pb-5">كل المسؤولين</h2>
      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">رقم الجوال</th>
            <th scope="col">البريد الإلكتروني</th>
            <th scope="col">نوع المسؤول</th>
            <th scope="col" v-if="type == 'superAdmin'"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="user.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.number }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.userType }}</td>
            <td class="actions" v-if="type == 'superAdmin'">
              <router-link :to="{ name: 'edit_admin', params: { id: user.id } }">
                <button type="button"><i class="fe fe-edit fe-16"></i></button
              ></router-link>
              <button type="button" @click="delUser(user.id)">
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
  name: "admins",
  data() {
    return {
      users: [],
      loading: false,
      type: "",
    };
  },
  mounted() {
    this.fetchUsers();
    this.user();
  },
  methods: {
    delUser(id) {
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
            axios.post(`api/user/del/${id}`);
            this.$swal.fire("تم!", "تم الحذف بنجاح", "success");
            this.fetchUsers();
          }
        });
    },
    async fetchUsers() {
      this.loading = true;
      await axios
        .get(`api/admins`)
        .then((res) => {
          this.users = res.data.users;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
      this.loading = false;
    },

    async user() {
      await axios.get(`api/user`).then((res) => {
        this.type = res.data.userType;
      });
    },
  },
};
</script>

<style></style>
