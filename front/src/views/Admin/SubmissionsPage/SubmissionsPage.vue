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
  methods: {
    openAccordion($event) {
      const ul = $event.currentTarget.querySelector("ul");
      $event.currentTarget.classList.toggle("active");
      if (ul.style.maxHeight) {
        ul.style.maxHeight = null;
      } else {
        ul.style.maxHeight = ul.scrollHeight + "px";
      }
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
      <div
        class="submission"
        v-for="submission in submissionsSortByDate"
        :key="submission.id"
        @click.prevent="openAccordion"
      >
        <div class="submission-header">
          <h2>UUID :{{ submission.uuid }}</h2>
          <p>{{ submission.created_at }}</p>
          <button class="open-accordion">
            <svg
              viewBox="0 0 467 257"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
            >
              <g
                id="Page-1"
                stroke="none"
                stroke-width="1"
                fill="none"
                fill-rule="evenodd"
              >
                <g
                  id="noun-chevron-down-4032716"
                  fill="white"
                  fill-rule="nonzero"
                >
                  <path
                    d="M459.986628,6.9023 C455.603828,2.4843 449.642628,-2.84217094e-14 443.420628,-2.84217094e-14 C437.198628,-2.84217094e-14 431.236628,2.4844 426.854628,6.9023 L233.424628,200.5723 L39.9946282,6.9023 C34.0766282,0.9843 25.4476282,-1.3282 17.3656282,0.8398 C9.27972824,3.0039 2.96362824,9.3203 0.799628237,17.4058 C-1.36837176,25.4878 0.944158237,34.1168 6.86212824,40.0348 L216.862128,250.0348 C221.244928,254.4528 227.206128,256.9371 233.428128,256.9371 C239.650128,256.9371 245.612128,254.4527 249.994128,250.0348 L459.994128,40.0348 C464.412128,35.652 466.896428,29.6908 466.896428,23.4688 C466.896428,17.2468 464.412028,11.2848 459.994128,6.9028 L459.986628,6.9023 Z"
                    id="Path"
                  ></path>
                </g>
              </g>
            </svg>
          </button>
        </div>
        <ul>
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
            <span v-if="response.question.type.name == 'textarea'">
              {{ response.response }}
            </span>
            <span v-if="response.question.type.name == 'rating'">
              {{ `${response.response}/5` }}
            </span>
            <span v-if="response.question.type.name == 'choice'">
              {{ response.choices[0].response }}
            </span>
          </li>
        </ul>
      </div>
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
  gap: 40px;
}
.submission {
  height: 100%;
  transition: 0.5s ease;
  box-shadow: $box-shadow;
  border-radius: 7px;
  cursor: pointer;
  &.active {
    & .submission-header {
      border-radius: 7px 7px 0 0;
      .open-accordion {
        transform-origin: center;
        transform: translate(0, -50%) rotateX(-180deg);
      }
    }
  }
  &-header {
    display: flex;
    justify-content: space-between;
    background: linear-gradient(
      -90deg,
      rgba(140, 83, 255, 1) 0%,
      rgba(84, 0, 255, 1) 100%
    );
    align-items: center;
    padding: 30px;
    border-radius: 7px;
    color: white;
    position: relative;
    padding-right: 100px;

    .open-accordion {
      position: absolute;
      right: 30px;
      top: 50%;
      transform: translate(0, -50%) rotateX(0);
      background: none;
      border: none;
      color: white;
      font-size: 40px;
      cursor: pointer;
      display: flex;
      transition: transform 0.3s ease-in-out;
      svg {
        width: 30px;
      }
    }
  }
}
ul {
  list-style-type: none;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0 auto;
  border-radius: 7px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
li {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  height: 55px;
  color: #141414;
  padding: 5px;
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
      font-size: 18px;
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
    padding: 10px 0;
    box-shadow: 0px 1px 0px 0px rgba(142, 77, 77, 0.1);
    align-items: center;
    span {
      border: none;
      background: none;
      text-transform: uppercase;
      font-size: 20px;
      @media (max-width: $screen-max-lg) {
        font-size: 18px;
      }
    }
  }
}
</style>
