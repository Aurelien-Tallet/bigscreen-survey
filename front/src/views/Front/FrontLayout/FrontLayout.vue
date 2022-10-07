<script>
import {RouterLink, RouterView} from "vue-router";

export default {
  name: "front-layout",
  props: {
    name: {},
  },
}
</script>

<template>
  <div class="AppLayout">
    <nav class="AppLayout__nav">
      <ul class="nav-links">
        <li class="nav-link">
          <router-link to="/">Sondage</router-link>
        </li>
      </ul>
    </nav>
    <main :class="name" class="AppLayout__main">
      <slot></slot>
    </main>
    <footer class="AppLayout__footer">
      footer
    </footer>
  </div>
</template>

<style lang="scss" scoped>
@import "FrontLayout.scss";
</style>
