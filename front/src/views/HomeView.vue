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
    this.form = await FormDataService.get(1);
    this.questions = this.form[0].questions;
  },
};
</script>

<template>
  <h1>Hellooo</h1>
</template>
<style scoped></style>
