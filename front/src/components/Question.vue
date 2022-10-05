<script>
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
      value: "",
    };
  },

  methods: {
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
    charsLeft() {
      return 255 - this.value.length;
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
          isValid = this.value.length <= 255 && this.value.length > 0;
          break;
        case "choice":
          isValid = this.value;
          break;
        case "rating":
          isValid =
            typeof this.value === "number" &&
            this.value >= 0 &&
            this.value <= 5;
          break;
      }
      return isValid;
    },
  },

  async created() {

  },
};
</script>

<template>
  <li class="single-question" :class="{ hidden, active }" :style="{ zIndex }">
    <div class="single-question__content">
      <h3 class="title">{{ this.data.name }}</h3>
      <p class="body">{{ this.data.body }}</p>

      <div class="input-wrapper" v-if="this.data.type.name === 'textarea'">
        <input v-model="value" :maxlength="255" />
        <p class="char-left">
          {{ charsLeft }} caractère{{ charsLeft > 1 ? "s" : "" }} restant{{
            charsLeft > 1 ? "s" : ""
          }}
        </p>
      </div>
      <div class="input-wrapper" v-else-if="this.data.type.name === 'rating'">
        <input type="number" v-model.number="value" max="5" min="0" />
      </div>
      <div class="input-wrapper" v-else-if="this.data.type.name === 'choice'">
        <select v-model="value">
          <option disabled value="">Veuillez choisir une réponse</option>
          <option
            v-for="(choice, i) in this.data.choices"
            :key="i"
            :value="choice.id"
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
