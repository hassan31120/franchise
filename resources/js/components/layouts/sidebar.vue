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
        <router-link
          class="navbar-brand mx-auto mt-2 flex-fill text-center"
          :to="{ name: 'home' }"
        >
          <img src="@/assets/franchisingarab.png" alt="logo" width="230" />
        </router-link>
      </div>

      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a
            href="#admins"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-user-check fe-16"></i>
            <span class="ml-3 item-text">المسؤولين</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="admins">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'admins' }"
                ><span class="ml-1 item-text">كل المسؤولين</span>
              </router-link>
            </li>
            <li class="nav-item" v-if="type == 'superAdmin'">
              <router-link class="nav-link pl-3" :to="{ name: 'add_admin' }"
                ><span class="ml-1 item-text">إضافة مسؤول جديد</span>
              </router-link>
            </li>
          </ul>
        </li>
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
            <i class="fe fe-globe fe-16"></i>
            <span class="ml-3 item-text">الدول</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="countries">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'countries' }"
                ><span class="ml-1 item-text">كل الدول</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_country' }"
                ><span class="ml-1 item-text">إضافة دولة جديدة</span>
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
            <span class="ml-3 item-text">الأنشطة التجارية</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="categories">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'cats' }"
                ><span class="ml-1 item-text">كل الأنشطة التجارية</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_cat' }"
                ><span class="ml-1 item-text">إضافة نشاط تجاري جديد</span>
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
            <span class="ml-3 item-text">فرص الامتياز</span>
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
            href="#articles"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-book-open fe-16"></i>
            <span class="ml-3 item-text">المقالات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="articles">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'articles' }"
                ><span class="ml-1 item-text">كل المقالات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_article' }"
                ><span class="ml-1 item-text">إضافة مقال جديد</span>
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
            <i class="fe fe-bell fe-16"></i>
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
        <li class="nav-item dropdown">
          <a
            href="#orders"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-git-pull-request fe-16"></i>
            <span class="ml-3 item-text">الطلبات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="orders">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'orders' }"
                ><span class="ml-1 item-text">كل الطلبات</span>
              </router-link>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            href="#settings"
            data-toggle="collapse"
            aria-expanded="false"
            class="dropdown-toggle nav-link"
          >
            <i class="fe fe-settings fe-16"></i>
            <span class="ml-3 item-text">الإعدادات</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="settings">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'about' }"
                ><span class="ml-1 item-text">كل الإعدادات</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'edit_settings' }"
                ><span class="ml-1 item-text">تعديل الإعدادات</span>
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
          <i class="fe fe-log-out fe-12 mr-2"></i><span class="small">تسجيل خروج</span>
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
      type: "",
    };
  },
  mounted() {
    this.auth();
    this.user();
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

    async user() {
      await axios.get(`api/user`).then((res) => {
        this.type = res.data.userType;
      });
    },
  },
};
</script>

<style></style>
