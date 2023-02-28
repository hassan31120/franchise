<template>
  <main role="main" class="main-content">
    <div v-if="loading">
      <div><loadingPage /></div>
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <!-- <h2>Section title</h2> -->
          <h2 class="h5 page-title mt-3">مرحبا {{ user.name }} !</h2>
          <p class="text-muted">مرحبا بك في لوحة التحكم الخاصة ب Franchising Arab</p>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.admins }}</span>
                      <p class="small text-muted mb-2">عدد المسؤولين</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-user-check text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.users }}</span>
                      <p class="small text-muted mb-2">عدد الأعضاء</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-users text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.countries }}</span>
                      <p class="small text-muted mb-2">الدول المتاحة</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-globe text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.chances }}</span>
                      <p class="small text-muted mb-2">عدد الفرص</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-tag text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.cats }}</span>
                      <p class="small text-muted mb-2">عدد الأنشطة التجارية</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-layers text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">{{ data.orders }}</span>
                      <p class="small text-muted mb-2">عدد الطلبات</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-git-pull-request text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <h2 class="h5">آخر الطلبات والفرص</h2>
          <p class="text-muted">
            عرض مختصر لآخر الطلبات وفرص الامتياز المتعلقة بالأنشطة التجارية المتاحة
          </p>
          <div class="row">
            <!-- Recent Activity -->
            <div class="col-md-6 mb-4">
              <div class="card shadow">
                <div class="card-header">
                  <strong class="card-title float-left mb-0">آخر الفرص</strong>
                  <router-link
                    class="float-right small text-muted"
                    :to="{ name: 'chances' }"
                    >عرض الكل
                  </router-link>
                </div>
                <div class="card-body">
                  <div class="list-group list-group-flush my-n3">
                    <div
                      class="list-group-item"
                      v-for="chance in data.latestChances"
                      :key="chance.id"
                    >
                      <div class="row">
                        <div class="col-auto">
                          <div class="mt-2">
                            <img
                              :src="chance.logo"
                              alt="..."
                              class="rounded-circle"
                              width="60"
                              height="60"
                            />
                          </div>
                        </div>
                        <div class="col">
                          <small
                            ><strong>{{ chance.title }}</strong></small
                          >
                          <div class="my-0 text-muted small">
                            سعر الفرصة : {{ chance.price }}
                          </div>
                          <small class="badge badge-light text-muted">{{
                            chance.created_at
                          }}</small>
                        </div>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <!-- / .list-group -->
                </div>
                <!-- / .card-body -->
              </div>
              <!-- / .card -->
            </div>
            <div class="col-md-6 mb-4">
              <div class="card shadow">
                <div class="card-header">
                  <strong class="card-title float-left mb-0">آخر الطلبات</strong>
                  <router-link
                    class="float-right small text-muted"
                    :to="{ name: 'orders' }"
                    >عرض الكل
                  </router-link>
                </div>
                <div class="card-body">
                  <div class="list-group list-group-flush my-n3">
                    <div
                      class="list-group-item"
                      v-for="order in data.latestOrders"
                      :key="order.id"
                    >
                      <div class="row">
                        <div class="col-auto">
                          <div class="mt-2">
                            <img
                              :src="order.chance_logo"
                              alt="..."
                              class="rounded-circle"
                              width="60"
                              height="60"
                            />
                          </div>
                        </div>
                        <div class="col">
                          <small
                            ><strong>{{ order.chance_title }}</strong></small
                          >
                          <div class="my-0 text-muted small">
                            {{ order.user_number }} -> {{ order.user_name }}
                          </div>
                          <small class="badge badge-light text-muted">{{
                            order.created_at
                          }}</small>
                        </div>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <!-- / .list-group -->
                </div>
                <!-- / .card-body -->
              </div>
              <!-- / .card -->
            </div>
          </div>
          <!-- / .row -->
        </div>
      </div>
      <!-- .row -->
    </div>
    <footer>
      <p class="text-center">كل الحقوق محفوظة</p>
    </footer>
  </main>
</template>

<script>
export default {
  name: "home",
  data() {
    return { user: {}, data: {}, loading: false };
  },
  mounted() {
    this.getUser();
    this.getData();
  },
  methods: {
    async getUser() {
      this.loading = true;
      await axios
        .get(`api/user`)
        .then((res) => {
          this.user = res.data;
        })
        .catch(() => {
          this.$router.push({ name: "error500" });
        });
      this.loading = false;
    },
    async getData() {
      this.loading = true;
      await axios
        .get(`/api/data`)
        .then((res) => {
          this.data = res.data;
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
