/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

// import Vue from "vue";
window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
  "responses-component",
  require("./components/ResponsesComponent.vue").default
);

Vue.component(
  "notifications-component",
  require("./components/NotificationsComponent.vue").default
);

const app = new Vue({
  el: "#app"
});
