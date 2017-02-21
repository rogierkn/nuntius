window.Vue = require('vue');
const VueRouter = require('vue-router');
const VueResource = require('vue-resource');

Vue.use(VueRouter);
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = window.csrf;
Vue.http.options.root = window.nuntius_root_url;

const routes = [
    { path: '/create', component: require('./components/createForm.vue')},
    { path: '/home', component: require('./components/listPosts.vue')}


];

const router = new VueRouter({routes});


// Load components
Vue.component('saveButton', require('./components/saveButton.vue'));

const app = new Vue({
    router,
    el: '#nuntius-app'
});