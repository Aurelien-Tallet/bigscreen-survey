<script>
import BackLayout from "../BackLayout/BackLayout.vue";
export default {
  name: "FormPage",
  data: () => ({
    form: [],
    loaded: false,
  }),
  computed: {
    // Have all the questions been answered
    questions() {
      return this.form.questions;
    },
    isLoaded() {
      return this.loaded && this.questions.length > 0;
    },
  },
  async created() {
    // Get all data about the first form (id = 1)
    try {
      this.form = await this.$FormDataService.get(1);
      this.loaded = true;
    } catch (e) {
      console.error(e);
    }
  },
  components: { BackLayout },
};
</script>

<template>
  <BackLayout :title="form.entitled">
    <div class="form-wrapper" v-if="isLoaded">
      <ul>
        <li class="form-wrapper-hero">
          <span>N° </span>
          <span>Question </span>
          <span>Type </span>
        </li>
        <li
          v-for="(question, index) in questions"
          :key="question.id"
          :class="question.type.name"
        >
          <span>
            {{ index + 1 }}
          </span>
          <span>
            {{ question.body }}
          </span>
          <span>
            {{ question.type.name }}
          </span>
        </li>
      </ul>
    </div>
    <div class="no-data" v-else>
      <h1>Aucun questionnaire trouvé à ce jour !</h1>
    </div>
  </BackLayout>
</template>

<style lang="scss" scoped>
@import "./FormPage.scss";
</style>
