<script setup>
import {RouterLink, RouterView} from "vue-router";
</script>

<template>
  <div class="AppLayout">
    <nav>
      <router-link to="/">Sondage</router-link> |
    </nav>
    <main class="AppLayout__main">
      <slot></slot>
    </main>
    <footer class="AppLayout__footer">
    </footer>
  </div>
</template>

<style lang="scss" scoped>
@import "Layout.scss";
</style>
