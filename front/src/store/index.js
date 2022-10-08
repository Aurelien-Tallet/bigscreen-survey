import { createStore } from "vuex";
import user from "./modules/user";
import form from "./modules/form";
import menu from "./modules/menu";

export default createStore({
  //Import all stores modules
  modules: {
    user,
    form,
    menu,
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
