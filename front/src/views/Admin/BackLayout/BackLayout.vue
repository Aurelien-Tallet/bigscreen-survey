<script>
import SideBar from "@/components/SideBar/SideBar.vue";
import { createNamespacedHelpers } from "vuex";
const { mapGetters } = createNamespacedHelpers("menu");

export default {
  name: "back-layout",
  props: {
    // set the title for the page
    title: {
      type: String,
    },
  },
  components: { SideBar },
  computed: {
    // Get the current menu state
    ...mapGetters(["isOpen"]),
  },
};
</script>

<!-- Layout used for all admin pages with the SiderBar Menu -->
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
