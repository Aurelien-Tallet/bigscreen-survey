import {cookieExist, getCookie} from "@/utils/cookiesHelper";

const store = {
  namespaced: true,
  state: {
    token: cookieExist("access_token") ?  getCookie("access_token") :  null,
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
    },
  },
  actions: {
    setToken({ commit }, token) {
      commit("setToken", token);
    },
  },
  getters: {
    token: (state) => state.token,
  },
};

export default store;
