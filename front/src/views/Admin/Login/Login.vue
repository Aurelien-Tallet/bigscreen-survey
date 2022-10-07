<script>
import {createNamespacedHelpers} from "vuex";
import {setCookie} from "@/utils/cookiesHelper";
import router from "@/router";

const {mapActions, mapGetters} = createNamespacedHelpers("user");

export default {
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
      const { email, password } = this;
      try {
        const res = await this.$AuthDataService.login({ email, password });
        const { access_token } = res.data;
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

  <form @submit.prevent="login">
    <div class="content">
      <div class="input-wrapper">
        <label>Courriel</label>
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
</template>

<style lang="scss" scoped>
@import "../../../assets/global.scss";
</style>
