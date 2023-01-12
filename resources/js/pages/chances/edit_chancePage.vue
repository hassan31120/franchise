<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <edit_chance />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import edit_chance from "../../components/chances/edit.vue";
export default {
  name: "edit_chancePage",
  components: { navbar, sidebar, edit_chance },
};
</script>

<style></style>
