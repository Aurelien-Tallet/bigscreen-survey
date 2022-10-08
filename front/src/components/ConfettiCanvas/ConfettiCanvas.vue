<script>
import ConfettiGenerator from "confetti-js";
export default {
  name: "confetti-canvas",
  props:{
  },
  methods: {
    //Render the confettis
    render(){
      this.confetti.render();
    },
    //Clear the confettis
    clear(){
      this.confetti.clear();
    },

  },
  computed: {
  },

  async mounted() {
    //Confetti INIT
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
