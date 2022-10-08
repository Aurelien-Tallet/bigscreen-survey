<script>
import BackLayout from "../BackLayout/BackLayout.vue";

export default {
  name: "SubmissionsPage",
  components: { BackLayout },
  data: () => ({
    submissions: [],
  }),
  computed: {
    submissionsSortByDate() {
      return [...this.submissions].sort(
        (a, b) => new Date(b.created_at) - new Date(a.created_at)
      );
    },
  },
  async created() {
    this.form = await this.$FormDataService.getSubmission(1);
    this.submissions = this.form;
  },
};
</script>

<template>
  <BackLayout title="Toutes les soumissions des sondés">
    <div class="submissions-wrapper">
      <ul v-for="submission in submissionsSortByDate" :key="submission.id">
        <li class="form-wrapper-hero">
          <span>N° </span>
          <span>Question </span>
          <span>Réponse </span>
        </li>
        <li
          v-for="(response, index) in submission.responses"
          :key="response.id"
        >
          <span>{{ index + 1 }}</span>
          <span>{{ response.question.body }}</span>
          <span v-if="response.question.type.name != 'choice'">
            {{ response.response }}
          </span>
          <span v-if="response.question.type.name == 'choice'">
            {{ response.choices[0].response }}
          </span>
        </li>
      </ul>
    </div>
  </BackLayout>
</template>

<style lang="scss" scoped>
$box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
  rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

.submissions-wrapper {
  display: flex;
  flex-direction: column;
  width: 100%;
  gap: 20px;
}
ul {
  list-style-type: none;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
//   max-width: 1400px;
  margin: 0 auto;
  background: white;
  box-shadow: $box-shadow;
  border-radius: 7px;
}
li {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  height: 55px;
  color: #141414;
  padding: 0 5px;

  &:not(.form-wrapper-hero) {
    span {
      &:nth-child(1),
      &:nth-child(2) {
        position: relative;
        &::before {
          position: absolute;
          content: "";
          height: 30px;
          background-color: rgb(183, 183, 183);
          right: 0;
          top: 50%;
          transform: translateY(-50%);
          width: 1px;
        }
      }
    }
  }
  &:nth-child(even) {
    background: $light-grey;
  }
  &:nth-child(odd) {
    background: white;
  }
  span {
    display: block;
    height: auto;
    line-height: 1.2;
    @media (max-width: $screen-max-lg) {
      font-size: 16px;
    }
    &:nth-child(1) {
      width: 5%;
      font-size: 23px;
      font-weight: bold;
      text-align: center;
      @media (max-width: $screen-max-lg) {
        font-size: 20px;
      }
    }
    &:nth-child(2) {
      width: 60%;
    }
    &:nth-child(3) {
      width: 30%;
    }
  }
  &.form-wrapper-hero {
    font-weight: bold;
    width: 100%;
    height: 70px;
    box-shadow: 0px 1px 0px 0px rgba(142, 77, 77, 0.1);
    align-items: center;
    span {
      border: none;
      background: none;
      text-transform: uppercase;
      font-size: 22px;
      @media (max-width: $screen-max-lg) {
        font-size: 18px;
      }
    }
  }
}
</style>
