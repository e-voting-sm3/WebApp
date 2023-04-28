import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes'


require('./bootstrap');

window.Vue = require('vue').default;


// components
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);




Vue.component('candidate-page', require('./components/pages/CandidateComponent.vue').default);
Vue.component('vote-page', require('./components/pages/VoteComponent.vue').default);
Vue.component('result-page', require('./components/pages/ResultComponent.vue').default);

Vue.component('login-page', require('./components/pages/LoginComponent.vue').default);
Vue.component('register-page', require('./components/pages/RegisterComponent.vue').default);
Vue.component('tablecandidate-page', require('./components/pages/TableCandidate.vue').default);
Vue.component('tablevoter-page', require('./components/pages/TableVoter.vue').default);

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});
const app = new Vue({
    el: '#app',
    router
});
