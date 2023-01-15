export default {
    storeRoutes(context, routes) {
        //Mutate routes into the store
        return context.commit("storeRoutes", routes);
    },

    areRoutesLoaded(context){
        return context.commit("areRoutesLoaded");
    },
    
    // showTopBar(context, data) {

    //     context.commit("showTopBar");
    // },

    // hideTopBar(context, data) {

    //     context.commit("hideTopBar");
    // },
};