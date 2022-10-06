<script>
import Chart from "chart.js/auto";
export default {
  name: "radar-component",
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data: () => ({
    chart: {
      labels: [],
      datasets: [
        {
          label: "Avis Qualité BigScreen",
          data: [5, 1, 3, 1, 4],
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
  },
  created() {
    this.chart.labels = this.data.map(({ body }) => body);
    this.chart.datasets[0].data = this.getMeanForEachResponses(this.data);
  },
  mounted() {
    const options = {
      scale: {
        min: 0,
        max: 5,
        ticks: {
          stepSize: 1,
          font: {
            size: 10,
          },
        },
      },
    };
    const radarChart = new Chart(this.$refs.radarChart, {
      type: "radar",
      data: this.chart,
      options: options,
    });
  },
};
</script>

<template>
  <div class="radar-component">
    <canvas ref="radarChart" id="radarChart" width="800" height="800"></canvas>
  </div>
</template>

<style lang="scss" scoped>
.radar-component {
  //   max-width: 100px;
  height: auto;
}
canvas {
  width: 100%;
  height: 100%;
}
</style>
