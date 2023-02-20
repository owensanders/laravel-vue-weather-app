require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('cities-component', require('./components/CitiesComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);

const app = new Vue({
    el: '#weather-app',
});
