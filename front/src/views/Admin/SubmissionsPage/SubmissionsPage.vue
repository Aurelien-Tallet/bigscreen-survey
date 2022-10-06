<script>
import FormDataService from "@/services/FormDataService";

export default {
  name: "SubmissionPage",
  data: () => ({
    questions: [],
  }),
  async created() {
    this.form = await FormDataService.get(1);
    this.questions = this.form.questions;
  },
};
</script>

<template>
  <h1>Toutes les Soumissions :</h1>
  <div class="submission-wrapper"></div>
</template>

<style lang="scss" scoped></style>
