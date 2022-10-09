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
    // ..
    API_STATUS: false,
  },
  mutations: {
    // ...
    SET_API_STATUS(state, payload) {
      state.API_STATUS = payload;
    },
  },
  actions: {
    // ...
    SET_API_STATUS({ commit }, payload) {
      commit("SET_API_STATUS", payload);
    },
  },
});
