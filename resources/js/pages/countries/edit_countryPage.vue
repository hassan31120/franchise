<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_country />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_country from "../../components/countries/edit.vue";
export default {
  name: "edit_countryPage",
  components: { navbar, sidebar, edit_country },
};
</script>

<style></style>
