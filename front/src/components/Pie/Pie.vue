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
          borderColor: [],
          borderWidth: 1,
        },
      ],
    },
  }),
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

<style lang="scss" scoped></style>
