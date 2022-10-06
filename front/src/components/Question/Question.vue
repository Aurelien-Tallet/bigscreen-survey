<script>
import { createNamespacedHelpers } from "vuex";

const { mapActions, mapGetters } = createNamespacedHelpers("form");
export default {
  name: "single-question",
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
    displayMessage: function () {
      let msg = "";

      switch (this.data.type.name) {
        case "textarea":
          msg = "Veuillez entrer une réponse";
          break;
        case "choice":
          msg = "Veuillez choisir une option";
          break;
        case "rating":
          msg = "Veuillez entrer un chiffre entre 0 et 5";
          break;
      }

      return msg;
    },
  },

  computed: {
    ...mapGetters(["isSubmitted"]),
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
    isValid() {
      let isValid = false;
      switch (this.data.type.name) {
        case "textarea":
          isValid = this.response.length <= 255 && this.response.length > 0;
          break;
        case "choice":
          isValid = this.response;
          break;
        case "rating":
          isValid =
            typeof this.response === "number" &&
            this.response >= 0 &&
            this.response <= 5;
          break;
      }
      isValid
        ? this.setQuestionComponent({ id: this.data.id, valid: true })
        : this.setQuestionComponent({ id: this.data.id, valid: false });
      return isValid;
    },
  },

  async created() {},
};
</script>

<template>
  <li class="single-question" :class="{ hidden, active }" :style="{ zIndex }">
    <div class="single-question__content">
      <h3 class="title">{{ this.data.name }}</h3>
      <p class="body">{{ this.data.body }}</p>

      <div class="input-wrapper" v-if="this.data.type.name === 'textarea'">
        <input
            v-model="response"
            :maxlength="255"
            @input="updateQuestion"
            :disabled="isSubmitted"
        />
        <p class="char-left">
          {{ charsLeft }} caractère{{ charsLeft > 1 ? "s" : "" }} restant{{
            charsLeft > 1 ? "s" : ""
          }}
        </p>
      </div>
      <div class="input-wrapper" v-else-if="this.data.type.name === 'rating'">
        <input
          type="number"
          v-model.number="response"
          max="5"
          min="0"
          @input="updateQuestion"
          :disabled="isSubmitted"
        />
      </div>
      <div class="input-wrapper" v-else-if="this.data.type.name === 'choice'">
        <select v-model="response" @change="updateQuestion"
        :disabled="isSubmitted">
          <option disabled value="">Veuillez choisir une réponse</option>
          <option
            v-for="(choice, i) in this.data.choices"
            :key="i"
            :value="choice.response"
          >
            {{ choice.response }}
          </option>
        </select>
      </div>
    </div>
    <div class="single-question__footer">
      <div class="message" v-if="!isValid">{{ displayMessage() }}</div>

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
          :disabled="!this.isValid"
        >
          Suivant
        </button>
      </div>
    </div>
  </li>
</template>

<style lang="scss" scoped>
@import "./Question.scss";
</style>
