<script>
import { createNamespacedHelpers } from "vuex";

const { mapActions } = createNamespacedHelpers("form");
export default {
  name: "single-reponse",
  props: {
    data: {
      type: Object,
    },
    activeQuestion: {
      type: Number,
    },
    questionsLength: {},
    questionIndex: {},
  },
  data() {
    return {
      response: "",
    };
  },

  methods: {
    ...mapActions(["setQuestionComponent", "setQuestionResponse"]),
    updateQuestion() {
      const { id, type } = this.data;
      this.setQuestionResponse({
        id,
        type,
        response: this.response,
      });
    },
    nextQuestion: function () {
      if (this.activeQuestion < this.questionsLength - 1 && this.active) {
        this.$emit("incrementIndex");
      }
    },
    prevQuestion: function () {
      if (this.activeQuestion > 0 && this.active) {
        this.$emit("decrementIndex");
      }
    },
  },

  computed: {
    charsLeft() {
      return 255 - this.response.length;
    },
    hidden() {
      return this.questionIndex < this.activeQuestion;
    },
    active() {
      return this.questionIndex === this.activeQuestion;
    },
    zIndex() {
      return this.questionsLength - this.questionIndex;
    },
  },

  async created() {},
};
</script>

<template>
  <li
    class="single-question response"
    :class="{ hidden, active }"
    :style="{ zIndex }"
  >
    <div class="single-question__content">
      <h3 class="title">{{ this.data.question.name }}</h3>
      <p class="body">{{ this.data.question.body }}</p>
      <h3 class="response-display" v-if="this.data.response">
        {{ this.data.response }}
      </h3>
      <h3
        class="response-display"
        v-else
        v-for="(choice, i) in this.data.choices"
        :key="i"
      >
        {{ choice.response }}
      </h3>
    </div>
    <div class="single-question__footer">
      <div class="single-question__actions">
        <button
          class="cta action-cta"
          @click.prevent="this.prevQuestion()"
          v-if="this.questionIndex > 0"
        >
          Précedent
        </button>
        <button
          class="cta action-cta"
          @click.prevent="this.nextQuestion()"
          v-if="this.questionIndex < this.questionsLength - 1"
        >
          Suivant
        </button>
      </div>
    </div>
  </li>
</template>

<style lang="scss" scoped>
@import "../Question/Question.scss";
</style>
