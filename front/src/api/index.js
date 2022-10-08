import axios from "axios";
import store from "../store/modules/user";

// AXIOS HELPER
const instance = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
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
