<template>
  <div class="wrapper">
    <navbar />
    <sidebar />
    <orders />
  </div>
</template>

<script>
import navbar from "../../components/layouts/navbar.vue";
import sidebar from "../../components/layouts/sidebar.vue";
import orders from "../../components/orders/all.vue";
export default {
  name: "ordersPage",
  components: { navbar, sidebar, orders },
};
</script>

<style></style>
