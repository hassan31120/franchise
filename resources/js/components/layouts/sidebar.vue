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
          <svg
            version="1.1"
            id="logo"
            class="navbar-brand-img brand-sm"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            viewBox="0 0 120 120"
            xml:space="preserve"
          >
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
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
              <a class="nav-link pl-3" href="./ui-color.html"
                ><span class="ml-1 item-text">كل الأعضاء</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./ui-typograpy.html"
                ><span class="ml-1 item-text">إضافة عضو جديد</span></a
              >
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
              <a class="nav-link pl-3" href="./ui-color.html"
                ><span class="ml-1 item-text">كل البلاد</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./ui-typograpy.html"
                ><span class="ml-1 item-text">إضافة بلد جديد</span></a
              >
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
              <a class="nav-link pl-3" href="./ui-color.html"
                ><span class="ml-1 item-text">كل الأقسام</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./ui-typograpy.html"
                ><span class="ml-1 item-text">إضافة قسم جديد</span></a
              >
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
              <a class="nav-link pl-3" href="./ui-color.html"
                ><span class="ml-1 item-text">كل الفرص</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="./ui-typograpy.html"
                ><span class="ml-1 item-text">إضافة فرصة جديدة</span></a
              >
            </li>
          </ul>
        </li>
      </ul>
      <div class="btn-box w-100 mt-4 mb-1">
        <a
          href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
          target="_blank"
          class="btn mb-2 btn-primary btn-lg btn-block"
        >
          <i class="fe fe-log-out fe-12 mr-2"></i><span class="small">تسجيل الخروج</span>
        </a>
      </div>
    </nav>
  </aside>
</template>

<script>
export default {
  name: "sidebar",
};
</script>

<style></style>
