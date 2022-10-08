import { createRouter, createWebHistory } from "vue-router";
import FormPage from "@/views/Front/FormPage/FormPage.vue";
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
      component: () => import("@/views/Front/Login/Login.vue"),
    },
    {
      path: "/my-submission/:uuid",
      name: "submissionpage",
      component: () => import("@/views/Front/SubmissionPage/SubmissionPage.vue"),
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
    {
      path: "/:catchAll(.*)",
      name: "not-found",
      component: () => import("@/views/Front/NotFound/NotFound.vue"),
    },

  ],
});


// Check if each route require authentication or no
router.beforeEach((to, from, next) => {
  const currentUser = store.state.user.token;

  if (to.meta.requiresAuth && !currentUser) {
    // If authentication is required and user is not authenticate, redirect to Login vue
    next({ name: "Login" });
  } else if (to.path === "/login" && currentUser) {
    // If authentication is required and user is authenticate, redirect to Admin vue
    next("/administration");
  } else {
    // If authentication is not required redirect to desired page
    next();
  }
});

export default router;
