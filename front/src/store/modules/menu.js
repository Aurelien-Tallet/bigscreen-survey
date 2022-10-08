const store = {
  namespaced: true,
  state: {
    isOpen: window.innerWidth > 1200,
  },
  mutations: {
    setMenu(state, payload) {
      state.isOpen = payload;
    },
  },
  actions: {
    toggleMenu({ commit, state }) {
      commit("setMenu", !state.isOpen);
    },
    hideMenu({ commit }) {
      commit("setMenu", false);
    },
    showMenu({ commit }) {
      commit("setMenu", true);
    },
  },
  getters: {
    isOpen: (state) => state.isOpen,
  },
};

export default store;
