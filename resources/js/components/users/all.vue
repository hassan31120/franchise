<template>
  <main role="main" class="main-content">
    <div class="container-fluid">
      <h2 class="h5 page-title pb-5">كل الأعضاء</h2>

      <table class="table mt-5 table-hover">
        <thead style="background-color: #ff7c00">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الإسم</th>
            <th scope="col">رقم الهاتف</th>
            <th scope="col">الإيميل</th>
            <th scope="col">نوع المستخدم</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="user.id">
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.number }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.userType }}</td>
            <td class="actions">
              <button type="button"><i class="fe fe-edit fe-16"></i></button>
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
  name: "users",
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    this.fetchUsers();
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
      axios
        .get(`api/users`)
        .then((res) => {
          this.users = res.data.users;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
    },
  },
};
</script>

<style></style>
