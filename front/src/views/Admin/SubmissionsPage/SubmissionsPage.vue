<script>

export default {
  name: "SubmissionsPage",
  data: () => ({
    submissions: [],
  }),
  async created() {
    this.form = await this.$FormDataService.getSubmission(1);
    this.submissions = this.form;
  },
};
</script>

<template>
  <h1>Toutes les Soumissions :</h1>
  <div class="submission-wrapper">
    <ul>
      <div v-for="submission in submissions" :key="submission.id">
        <li v-for="response in submission.responses" :key="response.id">
          <p>{{ response.question.name }}</p>
          <p>{{ response.question.body }}</p>
          <p v-if="response.question.type.name != 'choice'">
            {{ response.response }}
          </p>
          <p v-if="response.question.type.name == 'choice'">
            {{ response.choices[0].response }}
          </p>
        </li>
      </div>
    </ul>
  </div>
</template>

<style lang="scss" scoped>
ul {
  list-style-type: none;
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 3rem;
  div {
    border: 1px solid $purple;
    border-radius: 30px;
    padding: 1rem;
  }
}
li {
  padding: 1em;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 1rem;
  border-bottom: 1px solid $purple;
  border-top: 1px solid $purple;
}
</style>
