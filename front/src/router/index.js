import { createRouter, createWebHistory } from "vue-router";
import FormPage from "@/views/FormPage/FormPage.vue";
import SubmissionPage from "@/views/SubmissionPage/SubmissionPage.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "formpage",
      component: FormPage,
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
  ],
});

export default router;
