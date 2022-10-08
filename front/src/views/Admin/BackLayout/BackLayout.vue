<script>
import SideBar from "@/components/SideBar/SideBar.vue";

export default {
  name: "back-layout",
  components: { SideBar },
};
</script>

<template>
  <div class="layout">
    <SideBar />
    <main class="main">
      <h1>Statistiques des réponses au sondage</h1>
      <slot></slot>
    </main>
  </div>
</template>

<style lang="scss" scoped>
@import "./BackLayout.scss";
</style>
