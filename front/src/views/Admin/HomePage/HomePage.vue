<script>
import Pie from "@/components/Pie/Pie.vue";
export default {
  name: "home-page",
  components: {
    Pie,
  },
  data: () => ({
    form: {},
  }),
};
</script>

<template>
  <div class="">Home</div>
  <Pie />
  <Pie />
  <Pie />
</template>

<style lang="scss" scoped>
@import "./HomePage.scss";
</style>
