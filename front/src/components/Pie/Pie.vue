<script>
import Chart from "chart.js/auto";
export default {
  name: "pie-component",
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data: () => ({
    chart: {
      labels: [
        "Saudi Arabia",
        "Russia",
        "Iraq",
        "United Arab Emirates",
        "Canada",
      ],
      datasets: [
        {
          label: "Réponses",
          data: [133.3, 86.2, 52.2, 51.2, 50.2],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
          ],
        },
      ],
    },
  }),
  methods: {
    randomNum: () => Math.floor(Math.random() * (235 - 52 + 1) + 52),
  },
  created() {
    this.chart.labels = this.data.choices.map(({ response }) => response);
    this.chart.datasets[0].data = this.data.choices.map(
      ({ id }) =>
        this.data.responses.filter(({ choices }) => choices[0].id === id).length
    );

    this.chart.datasets[0].backgroundColor = this.data.choices.map(() => {
      return `rgb(${this.randomNum()}, ${this.randomNum()}, ${this.randomNum()})`;
    });
  },
  mounted() {
    const pieChart = new Chart(this.$refs.pieChart, {
      type: "pie",
      data: this.chart,
    });
  },
};
</script>

<template>
  <div class="pie-component">
    <canvas ref="pieChart" id="pieChart" width="400" height="400"></canvas>
  </div>
</template>

<style lang="scss" scoped>
.pie-component {
  max-width: 500px;
  height: auto;
}
canvas {
  width: 100%;
  height: 100%;
}
</style>
