<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <countries />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import countries from "../../components/countries/all.vue";
export default {
  name: "add_userPage",
  components: { navbar, sidebar, countries },
};
</script>

<style></style>
