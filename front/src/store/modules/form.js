const store = {
  namespaced: true,
  state: {
    questionsComponents: {},
  },
  mutations: {
    setQuestionComponent(state, value) {
      state.questionsComponents[value.id] = value.valid;
    },
    // {
    //     id:1,
    //     valid:false
    // }
  },
  actions: {
    setQuestionComponent({ commit }, questionComponent) {
      commit("setQuestionComponent", questionComponent);
    },
  },
  getters: {
    questionsComponents: (state) => state.questionsComponents,
  },
};

export default store;
