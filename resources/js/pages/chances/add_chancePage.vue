<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <add_chance />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import add_chance from "../../components/chances/add.vue";
export default {
  name: "add_chancePage",
  components: { navbar, sidebar, add_chance },
};
</script>

<style></style>
