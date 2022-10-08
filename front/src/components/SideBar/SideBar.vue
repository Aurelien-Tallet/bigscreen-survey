<script>
import { createNamespacedHelpers } from "vuex";
import { deleteCookie } from "@/utils/cookiesHelper";
import router from "@/router";
const { mapActions: userMapActions } = createNamespacedHelpers("user");
const { mapActions: menuMapActions, mapGetters } =
  createNamespacedHelpers("menu");

export default {
  name: "side-bar",
  computed: {
    ...mapGetters(["isOpen"]),
  },
  methods: {
    ...userMapActions(["setToken"]),
    ...menuMapActions(["toggleMenu", "hideMenu", "showMenu"]),
    logout() {
      this.setToken(null);
      deleteCookie("access_token");
      router.go("/login");
    },
    onResize() {
      if (window.innerWidth < 1200) {
        this.hideMenu();
      } else {
        this.showMenu();
      }
    },
  },
  mounted() {
    window.addEventListener("resize", this.onResize);
  },
  unmounted() {
    window.removeEventListener("resize", this.onResize);
  },
};
</script>

<template>
  <header class="side-menu" :class="{ hidden: !isOpen }">
    <nav>
      <router-link to="/administration/" class="logo">
        <img src="@/assets/images/bigscreen.svg" alt="logo de BigScreen" />
      </router-link>
      <button
        class="burger"
        @click.prevent="toggleMenu"
        :class="{ active: isOpen }"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
      <ul>
        <li>
          <router-link to="/administration/">Accueil</router-link>
        </li>
        <li>
          <router-link to="/administration/form">Questionnaire</router-link>
        </li>
        <li>
          <router-link to="/administration/submissions"
            >Soumissions</router-link
          >
        </li>
      </ul>
      <button @click="logout" class="cta logout">Se déconnecter</button>
    </nav>
  </header>
</template>

<style lang="scss" scoped>
@import "./SideBar.scss";
</style>
