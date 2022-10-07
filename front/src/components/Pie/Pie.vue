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
    colors: [
      "#5DD9C1",
      "#FFB64D",
      "#FF5370",
      "#967ADC",
      "#37BC9B",
      "#ACFCD9",
      "#B084CC",
      "#665687",
      "#190933",
      "#FC9E4F",
      "#F4442E",
      "#712F79",
      "#FFDC5E",
      "#F9F871",
    ],
    chart: {
      labels: [],
      datasets: [
        {
          label: "",
          data: [],
          backgroundColor: [],
        },
      ],
    },
  }),
  methods: {
    randomNum: () => Math.floor(Math.random() * (235 - 52 + 1) + 52),
    pickRandomColor() {
      const randomColor =
        this.colors[Math.floor(Math.random() * this.colors.length)];
      this.colors = this.colors.filter((el) => el !== randomColor);
      return randomColor;
    },
  },
  created() {
    this.chart.labels = this.data.choices.map(({ response }) => response);
    this.chart.datasets[0].data = this.data.choices.map(
      ({ id }) =>
        this.data.responses.filter(({ choices }) => choices[0].id === id).length
    );

    this.chart.datasets[0].backgroundColor = this.data.choices.map(() => {
      return this.pickRandomColor();
    });
  },
  mounted() {
    const pieChart = new Chart(this.$refs.pieChart, {
      type: "pie",
      data: this.chart,
      options: {
        plugins: {
          legend: {
            display: false,
            position: "bottom",
            labels: {
              fontColor: "#000",
              fontSize: 22,
            },
          },
        },
      },
    });
    console.log(this.chart);
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
  // max-width: 500px;
  height: auto;
}
canvas {
  width: 100%;
  height: 100%;
}
</style>
