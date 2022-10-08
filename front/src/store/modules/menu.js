const store = {
  namespaced: true,
  state: {
    // set "true" if the user is in Desktop
    isOpen: window.innerWidth > 1200,
  },
  mutations: {
    // Mutate the state of the menu (true or false)
    setMenu(state, payload) {
      state.isOpen = payload;
    },
  },
  actions: {
    // Action to set the reverse of the current state of the menu
    toggleMenu({ commit, state }) {
      commit("setMenu", !state.isOpen);
    },
    // Action to set the state of the menu to false
    hideMenu({ commit }) {
      commit("setMenu", false);
    },
    // Action to set the state of the menu to true
    showMenu({ commit }) {
      commit("setMenu", true);
    },
  },
  getters: {
    // Get the state of the menu
    isOpen: (state) => state.isOpen,
  },
};

export default store;
