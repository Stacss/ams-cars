import './bootstrap';
import { createApp } from 'vue';
import CarSelector from './components/CarSelector.vue';

const app = createApp({});
app.component('car-selector', CarSelector);
app.mount('#app');
