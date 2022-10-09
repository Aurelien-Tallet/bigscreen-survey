<script>
import Response from "@/components/Response/Response.vue";
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";
import router from "@/router";

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
      nodata: true,
      errorMessage: "",
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
      this.nodata = false;
    } catch (e) {
      switch (e.request.status) {
        case 404:
          this.errorMessage =[ "Oops ! Cette soumission n'a pas l'air d'exister 🤔"]
          break;
        default:
          this.errorMessage = ["Une erreur interne est survenu 😱","Merci de réessayer ultérieurement"]
          break;
      }
    }
  },
};
</script>

<template>
  <FrontLayout name="submission-page">
    <!--    PAGE TITLE-->
    <h1 v-if="!nodata" class="page-title">
      Hey 👋 Heureux de te revoir, voici tes réponses :
    </h1>

    <!--    Response form-->
    <div v-if="!nodata" class="questions-form">
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

    <!--    Error Message-->
    <div class="error-data" v-if="nodata">
      <p v-for="(line, i) in this.errorMessage" :key="i">{{ line }}</p>
    </div>

  </FrontLayout>
</template>

<style lang="scss" scoped>
@import "../FormPage/FormPage";
</style>
