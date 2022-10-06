<script>
import FormDataService from "@/services/FormDataService";

export default {
  name: "SubmissionsPage",
  data: () => ({
    submissions: [],
  }),
  async created() {
    this.form = await FormDataService.getSubmission(1);
    console.log(this.form);
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
  max-width: 100%;
  display: flex;
  flex-direction: column;
  gap: 3rem;
  div {
    border: 1px solid black;
  }
}
li {
  padding: 1em;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 1rem;
  border-radius: 5px;
}
</style>
