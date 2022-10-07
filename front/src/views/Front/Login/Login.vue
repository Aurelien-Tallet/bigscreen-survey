<script>
import {createNamespacedHelpers} from "vuex";
import {setCookie} from "@/utils/cookiesHelper";
import router from "@/router";
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";

const {mapActions, mapGetters} = createNamespacedHelpers("user");

export default {
  components: {FrontLayout},
  data() {
    return {
      email: "",
      password: "",
      error: false,
    }
  },

  methods: {
    ...mapActions(["setToken"]),
    async login() {
      const {email, password} = this;
      try {
        const res = await this.$AuthDataService.login({email, password});
        const {access_token} = res.data;
        this.setToken(access_token);
        setCookie("access_token", access_token, 1)
        if (res.status === 200) {
          router.push("/administration");
        }
      } catch (e) {
        this.error = true;
      }
    }
  },
  computed: {
    isError() {
      return this.error;
    }
  }
}
</script>

<template>
  <FrontLayout :show-footer="false" :show-nav="false">
    <div class="form-login-container">
      <form @submit.prevent="login" class="form-login">
        <a href="/" class="brandlogo">
          <img src="@/assets/images/bigscreen.svg" alt="logo de BigScreen"/>
        </a>
        <div class="content">
          <div class="input-wrapper">
            <label>Adresse e-mail</label>
            <input :class="{isError}" v-model="email" type="text" name="email">
          </div>
          <div class="input-wrapper">
            <label>Mot de passe</label>
            <input :class="{isError}" v-model="password" type="password" name="password">
          </div>
        </div>
        <div v-if="isError" class="form-message">Courriel ou mot de passe incorrect</div>

        <button class="cta" type="submit">SE CONNECTER</button>
      </form>
      <a class="back-to-site" href="/">Retour au site</a>
    </div>
  </FrontLayout>
</template>

<style lang="scss" scoped>
@import "../../../assets/global";
@import "Login";
</style>
