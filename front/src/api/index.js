import axios from "axios";
import store from "../store/modules/user";
import ApiDataService from "@/services/ApiDataService";

// AXIOS HELPER
const instance = axios.create({
  baseURL: `${import.meta.env.VITE_API_URL}/api`,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

instance.interceptors.request.use((config) => {
  config.headers["Authorization"] = `Bearer ${store.state.token}`;
  return config;
});

export default instance;
