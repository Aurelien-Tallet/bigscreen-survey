const store = {
  namespaced: true,
  state: {
    questionsComponents: {},
    questionsResponses: [],
  },
  mutations: {
    setQuestionComponent(state, value) {
      state.questionsComponents[value.id] = value.valid;
    },
    setQuestionResponse(state, value) {
      let found = false;
      let index = 0;
      state.questionsResponses.forEach((question, i) => {
        if (question.id === value.id) {
          found = true;
          index = i;
        }
      });
      if (found) {
        state.questionsResponses[index] = value;
      } else {
        state.questionsResponses.push(value);
      }
    },
  },
  actions: {
    setQuestionComponent({ commit }, questionComponent) {
      commit("setQuestionComponent", questionComponent);
    },
    setQuestionResponse({ commit }, question) {
      commit("setQuestionResponse", question);
    },
  },
  getters: {
    questionsComponents: (state) => state.questionsComponents,
    questionsResponses: (state) => state.questionsResponses,
    isAllQuestionsValid: (state) => {
      const questions = state.questionsComponents;
      let validCount = 0;
      for (let key in questions) questions[key] && validCount++;
      return validCount === Object.keys(questions).length;
    },
  },
};

export default store;
