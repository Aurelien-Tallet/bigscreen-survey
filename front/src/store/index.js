import { createStore } from "vuex";
import user from "./modules/user";
import form from "./modules/form";

export default createStore({
  //Import all stores modules
  modules: {
    user,
    form,
  },
  state: {
    // ...
  },
  mutations: {
    // ...
  },
  actions: {
    // ...
  },
});
