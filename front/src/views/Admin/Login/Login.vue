<script>
import AuthDataService from "@/services/AuthDataService";

export default {
  data() {
    return {
      email: "",
      password: "",
    }
  },

  methods: {
    async login() {
      const {email, password} = this;
      const request = await AuthDataService.login({email, password})
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
