<script>
import { RouterLink, RouterView } from "vue-router";
import ApiDataService from "@/services/ApiDataService";

export default {
  //PING API
  async created() {
    try {
      const req = await ApiDataService.ping();
      if (req.status === 200) {
        console.log(req.data);
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
