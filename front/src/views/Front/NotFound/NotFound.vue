<script>
import FrontLayout from "@/views/Front/FrontLayout/FrontLayout.vue";

export default {
  name: "not-found",
  components: {
    FrontLayout,
  },
};
</script>

<template>
  <FrontLayout name="form-page">
    <div class="not-found-content">
    <h1>Oops ! La page que vous cherchez n'existe pas</h1>
    <img class="helmet-vr" src="@/assets/images/vr.svg" alt="logo de BigScreen"/>
    </div>
  </FrontLayout>
</template>

<style lang="scss" scoped>
@import "NotFound";
</style>
