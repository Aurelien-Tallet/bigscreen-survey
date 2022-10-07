<script>
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
};
</script>

<template>
  <h1>Questionnaire</h1>
  <div class="form-wrapper">
    <div class="form-wrapper-header">
      <h2>{{ form.entitled }}</h2>
      <p>{{ form.description }}</p>
    </div>
    <ul>
      <li class="form-wrapper-hero">
        <span>Numero </span>
        <span>Question </span>
        <span>Type </span>
      </li>
      <li
        v-for="question in questions"
        :key="question.id"
        :class="question.type.name"
      >
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
  align-items: center;
  gap: 1rem;
}
li {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  color: white;
//   border: 1px solid $purple;
  border-radius: 99999px;
  width: 90%;
  height: 55px;
  &.textarea {
    background: rgba(169, 16, 177, 0.602);
  }
  &.rating {
    background: rgba(204, 213, 33, 0.57);
  }
  &.choice {
    background: rgba(20, 187, 20, 0.697);
  }
  span {
    display: block;
    height: 100%;
    padding: 1em;
    line-height: 1.2;
    // border-left: 1px solid $purple;
    // border-right: 1px solid $purple;
    &:first-child {
      width: 20%;
      border: none;
    //   border-right: 1px solid $purple;
    //   border-radius: 99999px 0 0 99999px;
    //   background: $purple;
      color: white;
    }
    &:last-child {
      width: 15%;
      border: none;
    //   border-left: 1px solid $purple;
      border-radius: 0 99999px 99999px 0;
    //   background: $purple;
    //   text-transform: capitalize;
      color: white;
    }
    &:nth-child(2) {
      width: 100%;
      border: none;
    }
  }
  &.form-wrapper-hero {
    background: linear-gradient($dark-purple, $purple);
    color: white;
    font-weight: bold;
    border-radius: 0;
    width: 100%;
    padding: 1em 5em;
    span {
      border: none;
      background: none;
      text-transform: uppercase;
    }
  }
}
</style>
