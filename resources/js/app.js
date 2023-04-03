import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes'


require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('example-component', require('./components/ExampleComponent.vue').default);




Vue.component('candidate-page', require('./components/pages/CandidateComponent.vue').default);
Vue.component('vote-page', require('./components/pages/VoteComponent.vue').default);
Vue.component('result-page', require('./components/pages/ResultComponent.vue').default);

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});
const app = new Vue({
    el: '#app',
    router
});
