export default {
    //Save routes into the store
    storeRoutes(state, routes){
        state.routes = [];
        state.routes = routes;
    },

    areRoutesLoaded(state){
        state.areRoutesLoaded = !state.areRoutesLoaded;
    }

    // showTopBar(state) {
    //     state.showTopBar = true;
    // },

    // hideTopBar(state) {
    //     state.showTopBar = false;
    // },
};