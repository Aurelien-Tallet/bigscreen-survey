<script>
import FormDataService from "@/services/FormDataService";
import Question from "@/components/Question.vue";

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

  methods: {},

  async created() {
    this.form = await FormDataService.get(1);
    this.questions = this.form[0].questions;
  },
};
</script>

<template>
  <h1>FormPage</h1>
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
