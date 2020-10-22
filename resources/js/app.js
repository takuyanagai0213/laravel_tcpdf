import Vue from 'vue';
import axios from 'axios';
// require('./bootstrap');
// window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
  el: '#app',

})