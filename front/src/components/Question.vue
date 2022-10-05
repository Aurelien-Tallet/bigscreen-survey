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
      if (this.activeQuestion < this.questionsLength - 1) {
        this.$emit("incrementIndex");
      }
    },
    prevQuestion: function () {
      if (this.activeQuestion > 0) {
        this.$emit("decrementIndex");
      }
    },
  },

  computed: {
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
  <li class="single-question" :class="{ hidden, active }" :style="{ zIndex }">
    <div class="single-question__content">
      <h3 class="title">{{ this.data.name }}</h3>
      <p class="body">{{ this.data.body }}</p>

      <div v-if="this.data.type.name === 'textarea'">
        <input v-model="value" />
      </div>
      <div v-else-if="this.data.type.name === 'rating'">
        <input v-model.number="value" />
      </div>
      <div v-else-if="this.data.type.name === 'choice'">
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
    <div class="single-question__actions">
        <button class="cta action-cta" @click.prevent="this.prevQuestion()" v-if="this.questionIndex > 0">Précedent</button>
        <button class="cta action-cta" @click.prevent="this.nextQuestion()" v-if="this.questionIndex < this.questionsLength - 1">Suivant</button>
    </div>
  </li>
</template>

<style lang="scss" scoped>
@import "./Question.scss";
</style>
