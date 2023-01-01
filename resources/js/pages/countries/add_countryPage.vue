<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_country />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_country from "../../components/countries/add.vue";
export default {
  name: "add_userPage",
  components: { navbar, sidebar, add_country },
};
</script>

<style></style>
