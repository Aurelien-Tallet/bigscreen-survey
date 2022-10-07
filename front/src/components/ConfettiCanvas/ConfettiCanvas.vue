<script>
import ConfettiGenerator from "confetti-js";
export default {
  name: "confetti-canvas",
  props:{
  },
  methods: {
    render(){
      this.confetti.render();
    },
    clear(){
      this.confetti.clear();
    },

  },
  computed: {
  },

  async mounted() {
    const confettiSettings = {target: 'confetti'};
    this.confetti = new ConfettiGenerator(confettiSettings);
  },
};
</script>

<template>
  <canvas id="confetti"></canvas>
</template>

<style lang="scss" scoped>
@import "ConfettiCanvas";
</style>
