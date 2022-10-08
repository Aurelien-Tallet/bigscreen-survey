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
    formatDateToFrenchUsing(date) {
      return new Date(date).toLocaleDateString("fr-FR", {
        year: "numeric",
        month: "long",
        day: "numeric",
      });
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
          <h2>UUID : {{ submission.uuid }}</h2>
          <p>Date : {{ formatDateToFrenchUsing(submission.created_at) }}</p>
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

<style scoped lang="scss">
@import "./SubmissionsPage.scss";
</style>
