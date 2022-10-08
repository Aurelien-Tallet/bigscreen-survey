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
          <span>Numero </span>
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
$box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
  rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

.form-wrapper {
  //   padding: 2rem 0;
  max-width: 1400px;
  margin: 0 auto;
  background: white;
  box-shadow: $box-shadow;
  border-radius: 7px;
}
ul {
  list-style-type: none;
  max-width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
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
    @media (max-width: 1200px) {
      font-size: 16px;
    }
    &:nth-child(1) {
      width: 10%;
      font-size: 23px;
      font-weight: bold;
      text-align: center;
      @media (max-width: 1200px) {
        font-size: 20px;
      }
    }
    &:nth-child(2) {
      width: 70%;
    }
    &:nth-child(3) {
      width: 10%;
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
      @media (max-width: 1200px) {
        font-size: 18px;
      }
    }
  }
}
</style>
