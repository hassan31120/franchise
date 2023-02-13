<template>
  <p class="pb-5" v-html="settings.about"></p>
</template>

<script>
import axios from "axios";

export default {
  name: "about",
  data() {
    return {
      settings: [],
    };
  },
  mounted() {
    this.fetchSettings();
  },
  methods: {
    async fetchSettings() {
      await axios
        .get(`api/settings`)
        .then((res) => {
          this.settings = res.data.setting;
        })
        .catch(() => {
          this.$router.push({ name: "serverErr" });
        });
    },
  },
};
</script>

<style></style>
