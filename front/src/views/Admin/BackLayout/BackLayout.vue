<script>
import SideBar from "@/components/SideBar/SideBar.vue";
import { createNamespacedHelpers } from "vuex";
const { mapGetters } = createNamespacedHelpers("menu");

export default {
  name: "back-layout",
  props: {
    title: {
      type: String,
    },
  },
  components: { SideBar },
  computed: {
    ...mapGetters(["isOpen"]),
  },
};
</script>

<template>
  <div class="layout">
    <SideBar />
    <main class="main" :class="{ full: !isOpen }">
      <h1>{{ title }}</h1>
      <slot></slot>
    </main>
  </div>
</template>

<style lang="scss" scoped>
@import "./BackLayout.scss";
</style>
