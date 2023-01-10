<template>
  <div class="wrapper">
    <!-- <navbar /> -->
    <sidebar />
    <show_chance />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import show_chance from "../../components/chances/show.vue";
export default {
  name: "show_chancePage",
  components: { navbar, sidebar, show_chance },
};
</script>

<style></style>
