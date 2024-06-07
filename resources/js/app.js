import './bootstrap';
import { createApp } from 'vue';
import CarSelector from './components/CarSelector.vue';
import GetCarDataSelector from './components/GetCarDataSelector.vue';
import GetCarNewDataSelector from './components/GetCarNewDataSelector.vue';
import CustomScrollbar from 'custom-vue-scrollbar';
import 'custom-vue-scrollbar/dist/style.css';

const app = createApp({});

app.component('car-selector', CarSelector);
app.component('get-car-data-selector', GetCarDataSelector);
app.component('get-new-car', GetCarNewDataSelector);
app.component(CustomScrollbar.name, CustomScrollbar);
app.mount('#app');
