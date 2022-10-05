<script>
import FormDataService from "@/services/FormDataService";
import Question from "@/components/Question.vue";
import {createNamespacedHelpers} from "vuex";
const { mapActions } = createNamespacedHelpers("form");

export default {
  name: "form-page",
  components: {
    Question,
  },
  data() {
    return {
      activeQuestion:0,
      questions: [],
    };
  },

  methods: {
    ...mapActions([
      'setQuestionComponent',
    ])
  },

  async created() {
    console.log("created")
    this.form = await FormDataService.get(1);
    this.questions = this.form.questions;
    this.questions.forEach(el =>{
      this.setQuestionComponent({ id: el.id, valid: false });
    });
  },
};
</script>

<template>
  <form action="" class="questions-form">
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

    <button :disabled="!this.$store.getters['form/isAllQuestionsValid']" class="cta" type="submit">Valider</button>

  </form>
</template>

<style lang="scss" scoped>
@import "./FormPage.scss";
</style>
