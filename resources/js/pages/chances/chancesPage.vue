<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <chances />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import chances from "../../components/chances/all.vue";
export default {
  name: "chancesPage",
  components: { navbar, sidebar, chances },
};
</script>

<style></style>
