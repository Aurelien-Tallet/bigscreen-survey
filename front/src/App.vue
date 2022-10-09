<script>
import ApiDataService from "@/services/ApiDataService";

export default {
  //PING API
  async created() {
    try {
      const req = await ApiDataService.ping();
      if (req.status === 200) {
        this.$store.commit("SET_API_STATUS", true);
      }
    } catch (e) {
      console.error("API NOT FOUND");
    }
  },
};
</script>

<template>
  <RouterView />
</template>

<style scoped></style>
