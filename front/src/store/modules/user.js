import {cookieExist, getCookie} from "@/utils/cookiesHelper";

const store = {
  namespaced: true,

  // User state
  state: {
    token: cookieExist("access_token") ?  getCookie("access_token") :  null,
  },

  // User mutations
  mutations: {
    // Set or update user's token
    setToken(state, token) {
      state.token = token;
    },
  },

  // User actions
  actions: {
    setToken({ commit }, token) {
      commit("setToken", token);
    },
  },

  // User getters
  getters: {
    // Get user's token
    token: (state) => state.token,
  },
};

export default store;
