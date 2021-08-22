require("./bootstrap");
window.Vue = require("vue").default;

//Vue Router
import VueRouter from "vue-router";
Vue.use(VueRouter);

//Routes
import { routes } from "./routes/routes";
const router = new VueRouter({
    routes
    //mode:'history',
});

//Vuex
import Vuex from "vuex";
Vue.use(Vuex);
import storeData from "./store/store";
const store = new Vuex.Store(storeData);

import { filter } from "./filter/filter";
import mixin from "./helpers/mixin";

Vue.component("index", require("./components/public/index").default);

//import Index from "./components/public/index";

const app = new Vue({
    el: "#element",
    router,
    store
    // components: {
    //     index: Index
    // }
});
