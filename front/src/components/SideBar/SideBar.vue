<script>
import { createNamespacedHelpers } from "vuex";
import { deleteCookie } from "@/utils/cookiesHelper";
import router from "@/router";
const { mapActions } = createNamespacedHelpers("user");

export default {
  name: "side-bar",
  methods: {
    ...mapActions(["setToken"]),
    logout() {
      this.setToken(null);
      deleteCookie("access_token");
      router.go("/login");
    },
  },
};
</script>

<template>
  <header class="side-menu">
    <nav>
      <router-link to="/administration/" class="logo">
        <img src="@/assets/images/bigscreen.svg" alt="logo de BigScreen" />
      </router-link>
      <div class="burger">
        <span></span>
        <span></span>
        <span></span>
      </div>
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
