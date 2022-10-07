<script>

export default {
  name: "FormPage",
  data: () => ({
    questions: [],
  }),
  async created() {
    this.form = await this.$FormDataService.get(1);
    this.questions = this.form.questions;
  },
};
</script>

<template>
  <h1>Questionnaire</h1>
  <div class="form-wrapper">
    <ul>
      <li class="header">
        <span>Numero </span>
        <span>Question </span>
        <span>Type </span>
      </li>
      <li v-for="question in questions" :key="question.id">
        <span>
          {{ question.name }}
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
</template>

<style lang="scss" scoped>
.form-wrapper {
  padding: 3rem;
  max-width: 1400px;
  margin: 0 auto;
}
ul {
  list-style-type: none;
  max-width: 100%;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
li {
  padding: 1em;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  color: $purple;
  border: 1px solid $purple;
  border-radius: 99999px;
  &.header {
    background-color: $purple;
    color: white;
    font-weight: bold;
    border-radius: 0;
  }

  span {
    flex: 0 0 33%;
  }
}
</style>
