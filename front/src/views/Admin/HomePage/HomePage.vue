<script>
import Pie from "@/components/Pie/Pie.vue";
import Radar from "@/components/Radar/Radar.vue";

import BackLayout from "../BackLayout/BackLayout.vue";

export default {
  name: "home-page",
  components: {
    Pie,
    Radar,
    BackLayout,
  },
  data: () => ({
    data: [],
    charts: [
      {
        type: "Pie",
        id: 6,
        data: null,
      },
      {
        type: "Pie",
        id: 7,
        data: null,
      },
      {
        type: "Pie",
        id: 10,
        data: null,
      },
      {
        type: "radar",
        id: 11,
        data: null,
      },
      {
        type: "radar",
        id: 12,
        data: null,
      },
      {
        type: "radar",
        id: 13,
        data: null,
      },
      {
        type: "radar",
        id: 14,
        data: null,
      },
      {
        type: "radar",
        id: 15,
        data: null,
      },
    ],
  }),
  computed: {
    isAllChartsLoaded() {
      return this.charts.every(({ data }) => data !== null);
    },
    allPieCharts() {
      return this.charts.filter(({ type }) => type === "Pie");
    },
    groupQuestionsForRadar() {
      const questions = this.charts.filter(({ type }) => type === "radar");
      return questions.map(({ data }) => data);
    },
  },
  async created() {
    for (const chart of this.charts) {
      const data = await this.$FormDataService.getResponses(chart.id);
      chart.data = data;
    }
  },
};
</script>

<template>
  <BackLayout title="Statistiques des réponses au sondage">
    <div v-if="isAllChartsLoaded" class="chart-wrapper">
      <div class="section-header">
        <h2>Qualitée</h2>
      </div>
      <div class="radar-chart home-chart">
        <Radar :data="groupQuestionsForRadar" />
      </div>
      <div class="section-header">
        <h2>Équipements</h2>
      </div>
      <div class="pie-chart-wrapper">
        <div class="pie-chart home-chart" v-for="chart in allPieCharts" :key="chart.id">
          <div class="pie-chart-header">
            <h2>{{ chart.data.name }}</h2>
            <p>{{ chart.data.body }}</p>
          </div>
          <Pie :data="chart.data" />
        </div>
      </div>
    </div>
  </BackLayout>
</template>

<style lang="scss" scoped>
@import "./HomePage.scss";
</style>
