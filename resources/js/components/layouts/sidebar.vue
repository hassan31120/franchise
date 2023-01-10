<template>
  <aside
    class="sidebar-left border-right bg-white shadow"
    id="leftSidebar"
    data-simplebar
  >
    <a
      href="#"
      class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
      data-toggle="toggle"
    >
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <img src="@/assets/faf.png" alt="logo" width="220" height="60" />
        </a>
      </div>

      <p class="text-muted nav-heading mt-4 mb-1">
        <span>Franchise</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a
            href="#members"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-users fe-16"></i>
            <span class="ml-3 item-text">الأعضاء</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="members">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'users' }"
                ><span class="ml-1 item-text">كل الأعضاء</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_user' }"
                ><span class="ml-1 item-text">إضافة عضو جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#countries"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-pie-chart fe-16"></i>
            <span class="ml-3 item-text">البلاد</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="countries">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل البلاد</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة بلد جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#categories"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-layers fe-16"></i>
            <span class="ml-3 item-text">القطاعات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="categories">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'cats' }"
                ><span class="ml-1 item-text">كل القطاعات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_cat' }"
                ><span class="ml-1 item-text">إضافة قطاع جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#chances"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-tag fe-16"></i>
            <span class="ml-3 item-text">فرص الإمتياز</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="chances">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'chances' }"
                ><span class="ml-1 item-text">كل الفرص</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_chance' }"
                ><span class="ml-1 item-text">إضافة فرصة جديدة</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#noti"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-tag fe-16"></i>
            <span class="ml-3 item-text">الإشعارات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="noti">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'noti' }"
                ><span class="ml-1 item-text">إرسال اشعار جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
      <div class="btn-box w-100 mt-4 mb-1" v-if="log == 1">
        <button
          @click.prevent="logout"
          class="btn mb-2 btn-lg btn-block text-white"
          style="background-color: #ff7c00; border-radius: 50px"
        >
          <i class="fe fe-log-out fe-12 mr-2"></i><span class="small">تسجيل الخروج</span>
        </button>
      </div>
    </nav>
  </aside>
</template>

<script>
export default {
  name: "sidebar",
  data() {
    return {
      log: "",
    };
  },
  mounted() {
    this.auth();
  },
  methods: {
    logout() {
      axios.post(`api/logout`).then(() => {
        this.$router.push({ name: "login" });
      });
    },
    auth() {
      axios.get(`api/authenticated`).then((res) => {
        this.log = res.data;
      });
    },
  },
};
</script>

<style></style>
