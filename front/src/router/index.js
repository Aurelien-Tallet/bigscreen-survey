import { createRouter, createWebHistory } from "vue-router";
import FormPage from "@/views/FormPage/FormPage.vue";
import SubmissionPage from "@/views/SubmissionPage/SubmissionPage.vue";
import Login from "@/views/Admin/Login/Login.vue";

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
    },
    {
      path: "/administration/questionnaire",
      name: "questionnaire",
      component: () => import("@/views/Admin/FormPage/FormPage.vue"),
    },
  ],
});

export default router;
