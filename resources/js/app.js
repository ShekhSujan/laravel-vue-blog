require("./bootstrap");
window.Vue = require("vue").default;

//v form
import Form from "vform";
window.Form = Form;
//Vue Router
import VueRouter from "vue-router";
Vue.use(VueRouter);

//Routes
import { routes } from "./routes/routes-admin";
const router = new VueRouter({
    routes
    // mode: "history"
});

//Sweetalert2
import Swal from "sweetalert2";
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
window.Toast = Toast;
//Toastr
import toastr from "toastr";
window.toastr = toastr;
//Vuex
import Vuex from "vuex";
Vue.use(Vuex);
import storeData from "./store/store";
const store = new Vuex.Store(storeData);
import { filter } from "./filter/filter";
import mixin from "./helpers/mixin";
//Ckeditor
import CKEditor from "@ckeditor/ckeditor5-vue2";
Vue.use(CKEditor);
//DefaultComponent
Vue.component("home", require("./components/backend/home.vue").default);

const app = new Vue({
    el: "#app",
    router,
    store
});
