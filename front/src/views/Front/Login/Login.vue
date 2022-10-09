<script>
import { createNamespacedHelpers } from "vuex";
import { setCookie } from "@/utils/cookiesHelper";
import router from "@/router";
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";

const { mapActions } = createNamespacedHelpers("user");

export default {
  components: { FrontLayout },
  data() {
    return {
      email: "",
      password: "",
      error: false,
    };
  },

  methods: {
    //Get all actions from user's store
    ...mapActions(["setToken"]),

    //Login method
    async login() {
      const { email, password } = this;
      try {
        const res = await this.$AuthDataService.login({ email, password });
        const { access_token } = res.data;

        // Set user token in store
        this.setToken(access_token);

        // Set user token in cookies
        setCookie("access_token", access_token, 1);

        if (res.status === 200) {
          // If request successful, redirect to admin
          router.push("/administration");
        }
      } catch (e) {
        // If request not valid, display error
        this.error = true;
      }
    },
  },
  computed: {
    // Compute error bool
    isError() {
      return this.error;
    },
  },
};
</script>

<template>
  <FrontLayout :show-footer="false" :show-nav="false">
    <!--    Form login container-->
    <div class="form-login-container">
      <!--    Form login -->
      <form @submit.prevent="login" class="form-login">
        <a href="/" class="brandlogo">
          <img src="@/assets/images/bigscreen.svg" alt="logo de BigScreen" />
        </a>
        <div class="content">
          <!--    Form inputs -->
          <div class="input-wrapper">
            <label>Adresse e-mail</label>
            <input
              :class="{ isError }"
              v-model="email"
              type="text"
              name="email"
            />
          </div>
          <div class="input-wrapper">
            <label>Mot de passe</label>
            <input
              :class="{ isError }"
              v-model="password"
              type="password"
              name="password"
            />
          </div>
        </div>

        <!--    Form error display-->
        <div v-if="this.isError" class="form-message">
          Courriel ou mot de passe incorrect
        </div>

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
