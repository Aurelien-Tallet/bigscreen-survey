<script>
import Question from "@/components/Question/Question.vue";
import {createNamespacedHelpers} from "vuex";
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";
import ConfettiGenerator from "confetti-js";
import ConfettiCanvas from "@/components/ConfettiCanvas/ConfettiCanvas.vue";

const {mapActions, mapGetters} = createNamespacedHelpers("form");

export default {
  name: "form-page",
  components: {
    ConfettiCanvas,
    FrontLayout,
    Question,
  },
  data() {
    return {
      submission: "",
      activeQuestion: 0,
      questions: [],
      origin: window.location.origin,
    };
  },
  methods: {
    ...mapActions(["setQuestionComponent", "setSubmitted"]),
    async handleSubmit() {
      this.setSubmitted(true);
      if (this.$store.getters["form/isAllQuestionsValid"]) {
        try {
          const request = await this.$FormDataService.submit(
              {questions: this.$store.getters["form/questionsResponses"]},
              this.form.id
          );
          this.submission = request.submission;
          this.$refs.confetti.render();
        } catch (e) {
          console.log(e);
        }
      }
    },
  },
  computed: {
    ...mapGetters(["isSubmitted"]),
  },

  async created() {
    this.form = await this.$FormDataService.get(1);
    this.questions = this.form.questions;
    this.questions.forEach((el) => {
      this.setQuestionComponent({id: el.id, valid: false});
    });
  },
};
</script>

<template>
  <FrontLayout name="form-page">
    <ConfettiCanvas ref="confetti"/>
      <form action="" class="questions-form" @submit.prevent="handleSubmit">
        <ul class="questions-list">
          <Question
              v-for="(question, i) in questions"
              :key="i"
              :data="question"
              :questionIndex="i"
              :activeQuestion="activeQuestion"
              :questionsLength="questions.length"
              @incrementIndex="activeQuestion++"
              @decrementIndex="activeQuestion--"
          />
        </ul>

        <button
            :disabled="
          !this.$store.getters['form/isAllQuestionsValid'] || isSubmitted
        "
            class="cta"
            type="submit"
        >
          Finaliser
        </button>
      </form>

      <div class="form-message" v-if="isSubmitted">
        <p v-if="this.submission.length">
          Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
          votre investissement, nous vous préparons une application toujours plus
          facile à utiliser, seul ou en famille.<br/>
          Si vous désirez consulter vos réponse ultérieurement, vous pouvez
          consulter cette adresse:
          <a :href="`${origin}/my-submission/${submission}`" target="_blank">{{
              `${origin}/my-submission/${submission}`
            }}</a>
        </p>
      </div>
  </FrontLayout>
</template>

<style lang="scss" scoped>
@import "FormPage";
</style>
