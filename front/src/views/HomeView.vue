<script>
import axiosInstance from "@/api";
import FormDataService from "@/services/FormDataService";

export default {
  data() {
    return {
      questions: [],
    };
  },

  methods: {
  },

  async created() {
    this.forms = await FormDataService.get(1);
    console.log(this.forms)
  },
};
</script>

<template>
  <h1>Hellooo</h1>
</template>
<style scoped></style>
