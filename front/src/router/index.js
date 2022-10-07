import { createRouter, createWebHistory } from "vue-router";
import FormPage from "@/views/FormPage/FormPage.vue";
import SubmissionPage from "@/views/SubmissionPage/SubmissionPage.vue";
import Login from "@/views/Admin/Login/Login.vue";
import store from "@/store";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "formpage",
      component: FormPage,
    },
    {
      name: "Login",
      path: "/login",
      component: Login,
    },
    {
      path: "/my-submission/:uuid",
      name: "submissionpage",
      component: SubmissionPage,
    },
    {
      path: "/administration",
      name: "administration",
      component: () => import("@/views/Admin/HomePage/HomePage.vue"),
      meta: { requiresAuth: true },
    },
    {
      path: "/administration/form",
      name: "admin-form",
      component: () => import("@/views/Admin/FormPage/FormPage.vue"),
      meta: { requiresAuth: true },
    },
    {
      path: "/administration/submissions",
      name: "admin-submissions",
      component: () =>
        import("@/views/Admin/SubmissionsPage/SubmissionsPage.vue"),
      meta: { requiresAuth: true },
    },
  ],
});

router.beforeEach((to, from, next) => {
  const currentUser = store.state.user.token;
  console.log(currentUser);
  if (to.meta.requiresAuth && !currentUser) {
    next({ name: "Login" });
  } else if (to.path === "/login" && currentUser) {
    next("/administration");
  } else {
    next();
  }
});

export default router;
