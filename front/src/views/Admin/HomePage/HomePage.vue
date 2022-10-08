<script>
import Pie from "@/components/Pie/Pie.vue";
import Radar from "@/components/Radar/Radar.vue";

import { createNamespacedHelpers } from "vuex";
import { deleteCookie } from "@/utils/cookiesHelper";
import router from "@/router";
const { mapActions } = createNamespacedHelpers("user");

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
  methods: {
    ...mapActions(["setToken"]),
    logout() {
      this.setToken(null);
      deleteCookie("access_token");
      router.go("/login");
    },
  },
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
  <div class="container">
    <header class="side-menu">
      <nav>
        <router-link to="/administration/" class="logo">
          <img src="@/assets/images/bigscreen.svg" alt="logo de BigScreen" />
        </router-link>
        <ul>
          <li>
            <router-link to="/administration/">Accueil</router-link>
          </li>
          <li>
            <router-link to="/administration/form">Questionnaire</router-link>
          </li>
          <li>
            <router-link to="/administration/submissions"
              >Soumissions</router-link
            >
          </li>
        </ul>
        <button @click="logout" class="cta logout">Se déconnecter</button>
      </nav>
    </header>
    <main class="main">
      <h1>Statistiques des réponses au sondage</h1>
      <div v-if="isAllChartsLoaded" class="chart-wrapper">
        <div class="section-header">
          <h2>Qualitée</h2>
        </div>
        <div class="radar-chart">
          <Radar :data="groupQuestionsForRadar" />
        </div>
        <div class="section-header">
          <h2>Équipements</h2>
        </div>
        <div class="pie-chart-wrapper">
          <div class="pie-chart" v-for="chart in allPieCharts" :key="chart.id">
            <div class="pie-chart-header">
              <h2>{{ chart.data.name }}</h2>
              <p>{{ chart.data.body }}</p>
            </div>
            <Pie :data="chart.data" />
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<style lang="scss" scoped>
@import "./HomePage.scss";
</style>
