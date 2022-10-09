import axios from "axios";
import store from "../store/modules/user";
// AXIOS HELPER
console.log(import.meta.env);
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
