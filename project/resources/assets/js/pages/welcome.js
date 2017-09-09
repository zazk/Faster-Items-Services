import Vue from 'vue';
import Vuefire from 'vuefire'

import Welcome from '../components/Welcome.vue';

Vue.use(Vuefire);

new Vue(Welcome).$mount('#app');
