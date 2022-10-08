<script>
import Response from "@/components/Response/Response.vue";
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";

export default {
  name: "form-page",
  components: {
    FrontLayout,
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
  <FrontLayout name="submission-page">
    <!--    PAGE TITLE-->
    <h1 class="page-title">
      Hey 👋 Heureux de te revoir, voici tes réponses :
    </h1>

    <!--    Response form-->
    <div class="questions-form">
      <!--    Response List-->
      <ul class="questions-list">
        <!--     Reponses-->
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
  </FrontLayout>
</template>

<style lang="scss" scoped>
@import "../FormPage/FormPage";
</style>
