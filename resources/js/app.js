require('./bootstrap');
window.Vue = require('vue').default;
import VueResource from 'vue-resource';
global.$ = require( "jquery" );
Vue.use(VueResource);
import ScrollLoader from 'vue-scroll-loader';

Vue.use(ScrollLoader);

Vue.component('infinite-scroll-component', require('./components/InfiniteScrollComponent.vue').default);
Vue.component('user-component', require('./components/UserComponent.vue').default);
Vue.component('InfiniteLoading', require('vue-infinite-loading'));

const app = new Vue({
    el: '#app',
});
