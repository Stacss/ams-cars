<template>
    <div class="group-input">
        <div class="title-bar">
            <span>Хэтчбек</span>
            <img :src="closeIcon"
                 @mouseover="closeIcon = closeIconHover"
                 @mouseout="closeIcon = closeIconDefault"
                 alt="Close Icon">
        </div>
        <div class="search-container"
             @mouseover="searchIcon = searchIconHover"
             @mouseout="searchIcon = searchIconDefault">
            <img :src="searchIcon" alt="search Icon">
            <input v-model="search" placeholder="Поиск"
                   @focus="searchIcon = searchIconFocus"
                   @blur="searchIcon = searchIconDefault"
            >
        </div>
    </div>
    <custom-scrollbar :style="{ width: '271px', height: '416px' }" :wrapperStyle="{'display': 'flex', 'flex-wrap': 'wrap', 'justify-content': 'space-between'}" :autoExpand=false :thumbWidth="11" :autoHide=false :contentClass="items">
        <div v-for="car in filteredCars" :key="car.id" class="car-item">
            <img :src="car.image_url" :alt="car.name">
            <p>{{ car.name }}</p>
        </div>
    </custom-scrollbar>
    <div class="background-scroll-bar">

    </div>
</template>

<script>
import axios from 'axios';
import CustomScrollbar from 'custom-vue-scrollbar';
import closeIconDefault from '../../img/close.svg';
import closeIconHover from '../../img/close-hover.svg';
import searchIconDefault from '../../img/Search.svg';
import searchIconHover from '../../img/Search-hover.svg';
import searchIconFocus from '../../img/Search-focus.svg';


export default {
    data() {
        return {
            search: '',
            cars: [],
            closeIcon: closeIconDefault,
            searchIcon: searchIconDefault,
            closeIconDefault,
            closeIconHover,
            searchIconDefault,
            searchIconHover,
            searchIconFocus,
            isInputFocused: false,
        };
    },
    methods: {
        handleFocus() {
            this.isInputFocused = true;
            this.searchIcon = this.searchIconFocus;
        },
        handleBlur() {
            this.isInputFocused = false;
            this.searchIcon = this.searchIconDefault;
        },
        handleMouseOver() {
            if (!this.isInputFocused) {
                this.searchIcon = this.searchIconHover;
            }
        },
        handleMouseOut() {
            if (!this.isInputFocused) {
                this.searchIcon = this.searchIconDefault;
            }
        }
    },
    computed: {
        filteredCars() {
            return this.cars.filter(car => car.name.toLowerCase().includes(this.search.toLowerCase()));
        }
    },
    mounted() {
        axios.get('/api/cars')
            .then(response => {
                this.cars = response.data;
            })
            .catch(error => {
                console.error('Error fetching cars:', error);
            });
    }
};
</script>

<style scoped>
.group-input{
    width: 271px;
}
.title-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 0;
    font-family: Roboto;
    font-size: 11px;
    font-weight: 400;
    color: #828282;
}

.title-bar img {
    width: 10px;
    height: 10px;
    cursor: pointer;
}

.search-container {
    margin-right: 15px;
    display: flex;
    align-items: center;
    width: 100%;
    height: 28px;
    padding: 5px 5px;
    border-radius: 20px;
    border: 1px solid #B2B2B2;
    opacity: 0.8;
    box-sizing: border-box;
    margin: 15px 0;
}

.search-container img {
    width: 24px;
    height: 24px;
}

.search-container input {
    border: none;
    outline: none;
    width: calc(100% - 35px);
    height: 100%;
    font-size: 13px;
    font-family: Roboto, sans-serif;
    font-weight: 400;
    padding-left: 5px;
    border-radius: 20px 0 0 0;
    box-sizing: border-box;
}

.search-container input::placeholder {
    color: #B2B2B2;
}

.search-container:hover {
    border-color: #33ADD6;
}

.search-container:hover::placeholder {
    border-color: #33ADD6;
}

.search-container:focus-within {
    border-color: #5E5E5E;
}

.search-container:hover input::placeholder {
    color: #33ADD6;
}

.search-container input:focus::placeholder {
    color: #5E5E5E;
}
.items {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.car-item {
    flex: 1 1 calc(50% - 10px);
    margin: 5px 0;
    text-align: center;
    background: #F1F1F1;
    padding: 0.72px 5.78px 4.17px 8.67px;
    border-radius: 2.17px;
    box-sizing: border-box;
    padding-bottom: 5px;
}
.car-item:nth-child(odd) {
    margin-right: 5px;
}
.car-item:nth-child(even) {
    margin-left: 5px;
}
.car-item p{
    margin: 0;
    text-align: center;
    font-family: Roboto, sans-serif;
    font-size: 12px;
    font-weight: 400;
}

/*.background-scroll-bar {
    width: 5px;
    height: 409px;
    position: absolute;
    top: 164px;
    left: 359px;
    border-color: #ECEDF1;
    z-index: 1;
}*/
</style>
