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
    instanceRadar: null,
    // Set default options for the Radar chart
    options: {
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
    },
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
    // Calculate the mean of each response
    getMeanForEachResponses: (data) =>
      data.map(
        ({ responses }) =>
          responses.reduce((acc, { response }) => acc + parseInt(response), 0) /
          responses.length
      ),
    // Group 2 words by 2 words to display labels without overflow 
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
    // Get labels to use it in the chart
    this.chart.labels = this.data.map(({ body }) => this.splitText(body));

    // Get mean of each response to use it in the chart
    this.chart.datasets[0].data = this.getMeanForEachResponses(this.data);
  },
  mounted() {

    // Instanciate the radar chart
    this.instanceRadar = new Chart(this.$refs.radarChart, {
      type: "radar",
      data: this.chart,
      options: this.options,
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
