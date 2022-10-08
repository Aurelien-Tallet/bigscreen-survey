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
    instancePie: null,
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
    this.instancePie = new Chart(this.$refs.pieChart, {
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
    <div class="pie-component-canvas">
      <canvas ref="pieChart" id="pieChart" width="400" height="400"></canvas>
    </div>
    <div class="legends">
      <div
        v-for="(choice, index) in data.choices"
        :key="choice.id"
        class="legend"
      >
        <div
          class="legend-color"
          :style="{ backgroundColor: chart.datasets[0].backgroundColor[index] }"
        ></div>
        <p>{{ choice.response }}</p>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.pie-component {
  padding: 15px;
  height: auto;
  &-canvas {
    max-width: 250px;
    margin: 0 auto;
    @media (max-width: $screen-max-sm) {
      max-width: 50%;
    }
    @media (max-width: $screen-max-xs) {
      max-width: 70%;
    }
  }
  .legends {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1rem;
  }
  .legend {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 2px;
    font-size: 14px;
    font-style: italic;
    .legend-color {
      width: 15px;
      height: 15px;
      border-radius: 50%;
    }
  }
}
canvas {
  width: 100%;
  height: 100%;
}
</style>
