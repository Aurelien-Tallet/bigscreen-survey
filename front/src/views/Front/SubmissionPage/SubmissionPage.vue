<script>
import Response from "@/components/Response/Response.vue";

export default {
  name: "form-page",
  components: {
    Response,
  },
  data() {
    return {
      activeQuestion: 0,
      responses: [],
    };
  },

  methods: {
    // ...mapActions(["setQuestionComponent"]),
  },

  async created() {
    try {
      this.submission = await this.$SubmissionDataService.get(
        this.$route.params.uuid
      );
      this.responses = this.submission.responses;
    } catch (e) {
      console.log(e);
      // window.location = "/"
    }
    console.log(this.submission);
  },
};
</script>

<template>
  <div class="questions-form">
    <ul class="questions-list">
      <Response
        v-for="(question, i) in responses"
        :key="i"
        :data="question"
        :questionIndex="i"
        :activeQuestion="activeQuestion"
        :questionsLength="responses.length"
        @incrementIndex="activeQuestion++"
        @decrementIndex="activeQuestion--"
      />
    </ul>
  </div>
</template>

<style lang="scss" scoped>
@import "../FormPage/FormPage";
</style>
