import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const counterModules = {

    namespaced: true,

    state() {
        return {
            counter: 1,
        };
    },
    mutations: {
        increment(state) {
            state.counter++;
        },
    },
    actions: {
        increment(context, data) {
            // for data will be data.value
            
            context.commit("increment");
        },
    },
    getters: {
        finalCounter(state) {
            return state.counter;
        },

        finalCounter2(_, getters){
            // the dash is for the state
            return getters.finalCounter;
        }
    },
};

const store = new Vuex.Store({
    modules: {
        numbers: counterModules,
    },
    state: {
        // count: 110,
    },
    mutations: {
        // INCREMENT(state) {
        //     state.count++;
        // },
        // DECREMENT(state) {
        //     state.count--;
        // },
    },
});

export default store;
