


const store = {
    namespaced: true,
    state: {
        user: {
            data: {},
            token: null,
        }
    },
    mutations: {
        setToken(state, token) {
            state.user.token = token;
        },
    },
    actions: {
        setUser({ commit }, user) {
            commit('setUser', user);
        },
        setToken({ commit }, token) {
            commit('setToken', token);
        },
    },
    getters: {
        user: state => state.user.data,
        token: state => state.user.token,
    },
};


export default store;