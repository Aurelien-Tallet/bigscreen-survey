import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "./api";
import FormDataService from "./services/FormDataService";
import SubmissionDataService from "./services/SubmissionDataService";
import AuthDataService from "./services/AuthDataService";
import "./assets/main.css";

const app = createApp(App);

app.use(router).use(store).mount("#app");

app.config.globalProperties.$axios = axios;
// Add all Data Services to the Vue instance to use them in all components
app.config.globalProperties.$FormDataService = FormDataService;

app.config.globalProperties.$SubmissionDataService = SubmissionDataService;

app.config.globalProperties.$AuthDataService = AuthDataService;
