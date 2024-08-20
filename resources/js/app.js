import Vue from "vue";
import "./bootstrap";
import App from "./components/App.vue";

const app = new Vue({
    components: {
        "app-component": App,
    },
});

app.$mount("#app");
