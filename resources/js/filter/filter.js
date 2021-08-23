//Moment Js
import Vue from "vue";
import moment from "moment";
Vue.filter("time", a => {
    return moment(a).format("MMMM Do YYYY, h:mm:ss a");
});

Vue.filter("subString", (content, length, ot) => {
    return content.substring(0, length, ot);
});
