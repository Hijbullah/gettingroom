/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('plan-component', require('./components/upgrade/PlanComponent.vue').default);
Vue.component('listing-component', require('./components/listings/ListingComponent.vue').default);
Vue.component('single-listing-component', require('./components/listings/SingleListingComponent.vue').default);
Vue.component('listing-new-component', require('./components/listings/ListingNewComponent.vue').default);


import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload)

//Date Picker

import VueDatePicker from '@mathieustan/vue-datepicker';
Vue.use(VueDatePicker);

// VForm registration
import { Form, HasError, AlertError } from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)

//Vue Select registration
import 'vue-select/dist/vue-select.css';
import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

import vDialogs from 'v-dialogs'
Vue.use(vDialogs)

import VerifyAccount from './components/modals/AccountVerify.vue';


// import { OpenStreetMapProvider } from 'leaflet-geosearch';
// const provider = new OpenStreetMapProvider();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        // searchValue: '',
        // searchResult: [],
    },
    methods: {
        openVerifyModal() {
            this.$dlg.modal(VerifyAccount, {
                width: 600,
                height: 600,
                title: '',
                params: {
                   
                },
                callback: data => {
                    
                }
            })
        },
        // placeSearch(){
        //     this.searchValue = this.$refs.placesearch.value;

        //     if (this.searchValue.length >= 3) {
        //         provider
        //             .search({ query: this.searchValue })
        //             .then(result => {
        //                 this.searchResult = result;
        //                 this.$refs.search_result_content.classList.remove('d-none');
        //             })
        //     } else {
        //         this.searchResult = [];
        //         // this.showResult = false;
        //     }
        // },
        // selectPlace(place){

        // },
    }
});
