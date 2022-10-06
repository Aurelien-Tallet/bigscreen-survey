<script>
import Pie from "@/components/Pie/Pie.vue";
import Radar from "@/components/Radar/Radar.vue";
import FormDataService from "@/services/FormDataService";
export default {
  name: "home-page",
  components: {
    Pie,
    Radar,
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
      const group = questions.reduce((acc, { data }) => {
        acc.push(data);
        return acc;
      }, []);
      return group;
    },
  },
  async created() {
    for (const chart of this.charts) {
      const data = await FormDataService.getResponses(chart.id);
      chart.data = data;
    }
  },
};
</script>

<template>
  <div class="">Home</div>

  <div v-if="isAllChartsLoaded" class="chart-wrapper">
    <Radar :data="groupQuestionsForRadar" />
    <div class="chart" v-for="chart in allPieCharts" :key="chart.id">
      <p>{{ chart.data.name }}</p>
      <p>{{ chart.data.body }}</p>
      <Pie :data="chart.data" />
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "./HomePage.scss";
</style>
