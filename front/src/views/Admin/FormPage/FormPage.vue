<script>
import FormDataService from "@/services/FormDataService";

export default {
  name: "FormPage",
  data: () => ({
    questions: [],
  }),
  async created() {
    this.form = await FormDataService.get(1);
    this.questions = this.form.questions;
  },
  //   async created() {
  //     this.data = await FormDataService.get(1).questions;
  //     console.log(await FormDataService.get(1));
  //   },
};
</script>

<template>
  <h1>Questionnaire</h1>
  <div class="form-wrapper">
    <ul>
      <li>
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
}
// $grey: #919191;
// $purple: #5400ff;
// $dark-purple:#4100d0;
ul {
  list-style-type: none;
  width: 100%;
  display: flex;
  flex-direction: column;
  background: $grey;
}
li {
  flex: 0 0 50%;
  padding: 1em;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  color: $purple;
  border: 1px solid $purple;
  span {
    flex: 0 0 33%;
  }
}
</style>
