<script>
import Question from "@/components/Question/Question.vue";
import {createNamespacedHelpers} from "vuex";
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";
import ConfettiGenerator from "confetti-js";

const {mapActions, mapGetters} = createNamespacedHelpers("form");

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

  async created() {
    const confettiSettings = {target: 'confetti'};
    this.confetti = new ConfettiGenerator(confettiSettings);
  },
};
</script>

<template>
  <canvas id="confetti"></canvas>
</template>

<style lang="scss" scoped>
@import "Confetti";
</style>
