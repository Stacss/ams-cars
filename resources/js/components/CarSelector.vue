<template>
    <div class="row">
        <div class="left-menu">
            <div v-for="(icon, index) in icons" :key="index"
                 :class="['icon-container', { 'selected': selectedIcon === index }]"
                 @mouseover="hoverIcon = index"
                 @mouseout="hoverIcon = -1"
                 @click="selectIcon(index)">
                <div :class="['img-box', { 'hover': selectedIcon === index || hoverIcon === index }]">
                    <img :src="getIconSrc(icon, index)" :alt="'icon-' + index">
                </div>
            </div>
        </div>
        <div class="items-box">

            <div class="group-input">
                <div class="title-bar">
                    <span>{{ selectedIconText }}</span>
                    <img :src="closeIcon"
                         @mouseover="closeIcon = closeIconHover"
                         @mouseout="closeIcon = closeIconDefault"
                         alt="Close Icon">
                </div>
                <div class="search-container"
                     @mouseover="searchIcon = searchIconHover"
                     @mouseout="searchIcon = searchIconDefault"
                >
                    <img :src="searchIcon" alt="search Icon">
                    <input v-model="search" placeholder="Поиск"
                           @focus="searchIcon = searchIconFocus"
                           @blur="searchIcon = searchIconDefault"
                    >
                </div>
            </div>
            <custom-scrollbar :style="{ width: '271px', height: '416px' }"
                              :wrapperStyle="{'display': 'flex', 'flex-wrap': 'wrap', 'justify-content': 'space-between'}"
                              :autoExpand=false :thumbWidth="11" :autoHide=false :contentClass="items">
                <div v-for="car in filteredCars" :key="car.id" class="car-item">
                    <img :src="getImagePath(car.image_url)" :alt="car.name" class="img-item">
                    <p>{{ car.brand.name }} {{ car.name }}</p>
                </div>
            </custom-scrollbar>


        </div>
    </div>
</template>

<script>
import axios from 'axios';
import closeIconDefault from '../../img/close.svg';
import closeIconHover from '../../img/close-hover.svg';
import searchIconDefault from '../../img/Search.svg';
import searchIconHover from '../../img/Search-hover.svg';
import searchIconFocus from '../../img/Search-focus.svg';

function getImagePath(partialPath) {
    return new URL(`../../img/${partialPath}`, import.meta.url).href;
}

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
            selectedIcon: -1,
            hoverIcon: -1,
            icons: [
                {default: 'all-car-blue.svg', active: 'all-car-white.svg'},
                {default: 'car-blue.svg', active: 'car-white.svg'},
                {default: 'sed-blue.svg', active: 'sed-white.svg'},
                {default: 'Jeep-blue.svg', active: 'Jeep-white.svg'}
            ]
        };
    },
    methods: {
        getImagePath(partialPath) {
            return new URL(`../../img/${partialPath}`, import.meta.url).href;
        },
        getIconSrc(icon, index) {
            const basePath = '../../img/';
            if (this.selectedIcon === index || this.hoverIcon === index) {
                return new URL(`${basePath}${icon.active}`, import.meta.url).href;
            }
            return new URL(`${basePath}${icon.default}`, import.meta.url).href;
        },
        selectIcon(index) {
            this.selectedIcon = index;
        }
    },
    computed: {
        filteredCars() {
            const searchTerm = this.search.toLowerCase();
            let filteredCars = this.cars.filter(car => {
                return car.name.toLowerCase().includes(searchTerm) || car.brand.name.toLowerCase().includes(searchTerm);
            });

            if (this.selectedIcon === 1) {
                filteredCars = filteredCars.filter(car => car.class === 'A');
            } else if (this.selectedIcon === 2) {
                filteredCars = filteredCars.filter(car => car.class === 'B');
            } else if (this.selectedIcon === 3) {
                filteredCars = filteredCars.filter(car => car.class === 'J');
            }

            return filteredCars;
        },
        selectedIconText() {
            switch (this.selectedIcon) {
                case 1:
                    return "Хэтчбек";
                case 2:
                    return "Легковой";
                case 3:
                    return "Джип";
                default:
                    return "Все авто";
            }
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
.row {
    display: flex;
}

.left-menu {
    min-width: 40px;
    height: 190px;
    background: #FFFFFF;
    border-radius: 10px;
    margin-right: 16px;
    margin-top: 78px;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
}

.img-box {
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.img-box:nth-child(-n+3) {
    margin-bottom: 10px;
}

.img-box.hover, .img-box:hover {
    background-color: #33ADD6;
}

.left-menu img {
    width: 24px;
    height: 24px;
    margin: auto;
}

.items-box {
    width: 286px;
    height: 497px;
    padding: 10px 5px 20px 20px;
    gap: 15px;
    border-radius: 15px;
    background: #FFFFFF;
}

.group-input {
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
    border: 1px solid #B2B2B2;
    border-radius: 20px;
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
    color: transparent;
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

.car-item p {
    margin: 0;
    text-align: center;
    font-family: Roboto, sans-serif;
    font-size: 12px;
    font-weight: 400;
}

.img-item {
    width: 115px;
    height: 87px;
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
