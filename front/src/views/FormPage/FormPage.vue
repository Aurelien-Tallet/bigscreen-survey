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
      validQuestions:0,
    };
  },

  methods: {
    ...mapActions([
      'setQuestionComponent',
    ])
  },

  async created() {
    this.form = await FormDataService.get(1);
    this.questions = this.form[0].questions;
    this.questions.forEach(el =>{
      this.setQuestionComponent({ id: el.id, valid: false });
    })

  },
};
</script>

<template>
  <h1>FormPage - valids : {{validQuestions}}</h1>
  <form action="" class="questions-form">
    <ul class="questions-list">
      <Question
        v-for="(question, i) in questions"
        :key="i"
        :data="question"
        :activeQuestion="activeQuestion"
        :questionIndex="i"
        :questionsLength="questions.length"
        @incrementIndex="activeQuestion++"
        @decrementIndex="activeQuestion--"
      />
    </ul>
  </form>
</template>

<style lang="scss" scoped>
@import "./FormPage.scss";
</style>
