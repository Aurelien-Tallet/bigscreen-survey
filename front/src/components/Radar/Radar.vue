<script>
import Chart from "chart.js/auto";
import { createWebHistory } from "vue-router";
export default {
  name: "radar-component",
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data: () => ({
    instanceRadar: null,
    chart: {
      labels: [],
      datasets: [
        {
          label: "Avis Qualité BigScreen",
          data: [],
          fill: true,
          backgroundColor: "rgba(54, 162, 235, 0.2)",
          borderColor: "rgb(54, 162, 235)",
          pointBackgroundColor: "rgb(54, 162, 235)",
          pointBorderColor: "#fff",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgb(54, 162, 235)",
        },
      ],
    },
  }),
  methods: {
    randomNum: () => Math.floor(Math.random() * (235 - 52 + 1) + 52),
    getMeanForEachResponses: (data) =>
      data.map(
        ({ responses }) =>
          responses.reduce((acc, { response }) => acc + parseInt(response), 0) /
          responses.length
      ),
    splitText(text) {
      const words = text.toLowerCase().split("pour")[1].split(" ");
      words.pop();
      let label = [];
      for (let i = 0; i < words.length; i += 2) {
        label.push(words.slice(i, i + 2).join(" "));
      }
      return label;
    },
  },
  created() {
    this.chart.labels = this.data.map(({ body }) => this.splitText(body));
    this.chart.datasets[0].data = this.getMeanForEachResponses(this.data);
  },
  mounted() {
    const options = {
      plugins: {
        legend: {
          display: false,
        },
      },
      scales: {
        r: {
          pointLabels: {
            font: {
              size: 12,
            },
          },
        },
      },
      scale: {
        min: 0,
        max: 5,
        ticks: {
          stepSize: 1,
          font: {
            size: 16,
          },
        },
      },
    };
    this.instanceRadar = new Chart(this.$refs.radarChart, {
      type: "radar",
      data: this.chart,
      options: options,
    });
  },
};
</script>

<template>
  <div class="radar-component">
    <canvas ref="radarChart" id="radarChart" width="600" height="600"></canvas>
  </div>
</template>

<style lang="scss" scoped>
@import "./Radar.scss";
</style>
