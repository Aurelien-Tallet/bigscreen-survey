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
    isAllQuestionsValid: (state) => {
      const questions = state.questionsComponents;
      let validCount = 0;
      for (let key in questions) questions[key] && validCount++;
      return validCount === Object.keys(questions).length;
    },
  },
};

export default store;
