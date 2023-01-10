<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navHassan">
    <div class="w-99 mb-4 d-flex">
      <router-link
        class="navbar-brand mx-auto mt-3 flex-fill text-center"
        :to="{ name: 'home' }"
      >
        <img src="@/assets/faf.png" alt="logo" width="180" height="60" />
      </router-link>
    </div>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <span class="ml-3 item-text">الأقسام</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="categories">
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'cats' }"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link pl-3" :to="{ name: 'add_cat' }"
                ><span class="ml-1 item-text">إضافة قسم جديد</span>
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
      <div
        class="btn-box w-100 mt-4 mb-1"
        style="background-color: #ff7c00; border-radius: 50px"
      >
        <button @click.prevent="logout" class="btn mb-2 btn-lg btn-block text-white">
          <i class="fe fe-log-out fe-12 mr-2"></i><span class="small">تسجيل الخروج</span>
        </button>
      </div>
    </div>
  </nav>

  <nav class="topnav navbar navbar-light">
    <!-- <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button> -->
    <form class="form-inline mr-auto searchform text-muted">
      <input
        class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted"
        type="search"
        placeholder="Type something..."
        aria-label="Search"
      />
    </form>
    <ul class="nav">
      <!-- <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link text-muted my-2"
          href="./#"
          data-toggle="modal"
          data-target=".modal-shortcut"
        >
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>
      <li class="nav-item nav-notif">
        <a
          class="nav-link text-muted my-2"
          href="./#"
          data-toggle="modal"
          data-target=".modal-notif"
        >
          <span class="fe fe-bell fe-16"></span>
          <span class="dot dot-md bg-success"></span>
        </a>
      </li> -->
      <li class="nav-item dropdown">
        <i class="fe fe-user"></i>
        {{ this.user.name }}
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "navbar",
  data() {
    return {
      user: {},
    };
  },
  mounted() {
    this.getUser();
  },
  methods: {
    getUser() {
      axios
        .get(`api/user`)
        .then((res) => {
          this.user = res.data;
        })
        .catch(() => {
          this.$router.push({ name: "error500   " });
        });
    },
  },
};
</script>

<style>
/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
  .navHassan {
    display: none;
  }
}
</style>
