<script>
import ApiDataService from "@/services/ApiDataService";

export default {
  async created() {
    //PING API to Check if it is online
    try {
      const req = await ApiDataService.ping();
      if (req.status === 200) {
        this.$store.commit("SET_API_STATUS", true);
      }
    } catch (e) {
      console.error("API not found or offline");
    }
  },
};
</script>

<template>
  <RouterView/>
</template>

<style scoped></style>
