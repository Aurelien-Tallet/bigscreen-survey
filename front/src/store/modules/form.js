const store = {
  namespaced: true,

  // Form state
  state: {
    questionsComponents: {},
    questionsResponses: [],
    isSubmitted: false,
  },

  // Form mutations
  mutations: {
    // Set Form status
    setSubmitted(state, value) {
      state.isSubmitted = value;
    },

    setQuestionComponent(state, value) {
      // Set or update form's question status
      state.questionsComponents[value.id] = value.valid;
    },

    setQuestionResponse(state, value) {
      // Set or update form's question input
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

  // Form actions
  actions: {
    setSubmitted({ commit }, bool) {
      commit("setSubmitted", bool);
    },
    setQuestionComponent({ commit }, questionComponent) {
      commit("setQuestionComponent", questionComponent);
    },
    setQuestionResponse({ commit }, question) {
      commit("setQuestionResponse", question);
    },
  },
  // Form getters
  getters: {
    isSubmitted: (state) => state.isSubmitted,
    questionsComponents: (state) => state.questionsComponents,
    questionsResponses: (state) => state.questionsResponses,
    isAllQuestionsValid: (state) => {
      // Check if all user responses are valid
      const questions = state.questionsComponents;
      let validCount = 0;
      for (let key in questions) questions[key] && validCount++;
      return validCount === Object.keys(questions).length;
    },
  },
};

export default store;
