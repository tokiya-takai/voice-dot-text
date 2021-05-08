require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('web-speech-api-component', require('./components/WebSpeechApiComponent.vue').default);

const app = new Vue({
    el: '#app',
});
