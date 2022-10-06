<script>
import AuthDataService from "@/services/AuthDataService";
import {createNamespacedHelpers} from "vuex";
import {setCookie} from "@/utils/cookiesHelper";
import router from "@/router";

const {mapActions, mapGetters} = createNamespacedHelpers("user");

export default {
  data() {
    return {
      email: "",
      password: "",
    }
  },

  methods: {
    ...mapActions(["setToken"]),
    async login() {
      const {email, password} = this;
      const res = await AuthDataService.login({email, password})
      const {access_token} = res.data
      this.setToken(access_token)
      setCookie("access_token", access_token, 1)
      if (res.status === 200) {
        router.push('/administration')
      }
    }
  },
}
</script>

<template>

  <form @submit.prevent="login">
    <div class="content">
      <div class="input-wrapper">
        <label>E-mail</label>
        <input v-model="email" type="text" name="email">
      </div>
      <div class="input-wrapper">
        <label>Mot de passe</label>
        <input v-model="password" type="password" name="password">
      </div>
    </div>

    <button class="cta" type="submit">SE CONNECTER</button>

  </form>
</template>

<style lang="scss" scoped>
@import "../../../assets/global.scss";
</style>
