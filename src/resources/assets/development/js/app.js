import Vue from 'vue'

import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import VueTimeago from 'vue-timeago'


Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VueTimeago,{locale: 'en-US', locales: {'en-US': require('vue-timeago/locales/en-US.json')}});

Vue.http.headers.common['X-CSRF-TOKEN'] = window.csrf;
Vue.http.options.root = window.nuntius_root_url;

const routes = [
    { path: '/home', name: 'home', component: require('./components/listPosts.vue')},

    { path: '/post/edit/:id', name:'postEdit', component: require('./components/editPost.vue'), props: true},


];

const router = new VueRouter({routes});


// Load components
Vue.component('createPostButton', require('./components/createPostButton.vue'));
Vue.component('saveButton', require('./components/saveButton.vue'));
Vue.component('deletePostButton', require('./components/deletePostButton.vue'));

Vue.component('publishToggleButton', require('./components/publishToggleButton.vue'));
Vue.component('loadingText', require('./components/loadingText.vue'));

const app = new Vue({
    router,
    el: '#nuntius-app'
});