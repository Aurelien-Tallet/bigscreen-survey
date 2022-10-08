<script>
import BackLayout from "../BackLayout/BackLayout.vue";
export default {
  name: "FormPage",
  data: () => ({
    form: [],
  }),
  computed: {
    questions() {
      return this.form.questions;
    },
  },
  async created() {
    this.form = await this.$FormDataService.get(1);
  },
  components: { BackLayout },
};
</script>

<template>
  <BackLayout :title="form.entitled">
    <div class="form-wrapper">
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
  </BackLayout>
</template>

<style lang="scss" scoped>
@import "./FormPage.scss";
</style>
