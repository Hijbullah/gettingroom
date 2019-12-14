<template>
    <div>
        <div class="gr-lokingn mb-3">
            <div class="row">
                <div class="col-md-3">
                    <p class="font-18 mb-2">I’m looking for</p>
                </div>
                <div class="col-md-9">
                    <div class="">
                        <a href="#" class="mb-2" 
                            :class="listingType == 'need_room' ? 'active' : '' " 
                            @click.prevent="changeListings('needrooms')"
                        >Room </a>
                        <a href="#" class=" mb-2" 
                            :class="listingType == 'need_apartment' ? 'active' : '' "  
                            @click.prevent="changeListings('needapartments')"
                        >Entire Place </a>

                        <a href="#" class=" mb-2" 
                            :class="listingType == 'offer_room' ? 'active' : '' " 
                            @click.prevent="changeListings('offerrooms')"
                        >Roommate </a>
                        <a href="#" class=" mb-2"
                            :class="listingType == 'offer_apartment' ? 'active' : '' " 
                            @click.prevent="changeListings('offerapartments')"
                        >Tenant </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="filer-control bg-white px-3 py-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="filter-area mb-sm-3 mb-3">
                        <a href="#" class="font-18 color-main-text" @click.prevent="showFilter = true">
                            <i class="fas fa-sliders-h "></i> Filters
                        </a>
                        <span v-if="total" class="font-16 mx-3">Total: {{ total }} | showing: ({{ from }} - {{to}})</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="/listingNew" class="font-20 d-block   py-2 btn btn-outline-success text-center">
                        <i class="fas fa-plus"></i>
                        Add New Listing
                    </a>
                </div>

                <div class="col-md-4 d-none d-md-block text-right">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle color-main-bg text-white"
                            data-toggle="dropdown" data-display="static" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg-right">
                            <button class="dropdown-item" type="button" @click.prevent="sortingBy('random')">Sort by: Last Activity</button>
                            <button class="dropdown-item" type="button" @click.prevent="sortingBy('latest')">Sort by: Newest</button>
                            <button class="dropdown-item" type="button" @click.prevent="sortingBy('rent')">Sort by: Rent</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="filter-content" v-if="showFilter">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="radius mt-3">
                        <div class="row">
                            <div class="col-md-2">
                                <p class="m-0 p-0 font-18">Radius</p>
                            </div>
                            <div class="col-md-10">
                                <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="age mt-3">
                        <div class="row">
                            <div class="col-md-2">
                                <p class="m-0 p-0 font-18">Age</p>
                            </div>
                            <div class="col-md-10">
                                <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="household mt-3">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="m-0 p-0 font-18">Household Sex</p>
                            </div>
                            <div class="col-md-9">
                                <button class="btn btn-outline-danger mr-3 mb-3 btn-md px-4">Female</button>
                                <button class="btn btn-outline-danger mr-3 mb-3 btn-md px-4">Male</button>
                                <button class="btn btn-outline-danger mr-3 mb-3 btn-md px-4">Co-ed</button>
                                <button class="btn btn-outline-danger mr-3 mb-3 btn-md px-4 active">Everyone</button>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="zodiac mt-4">
                        <div class="row">
                            <div class="col-md-2">
                                <p class="m-0 p-0 font-18">Zodiac</p>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark active font-18 btn-block mb-3">Aries</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Taurus</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Gemini</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Cancer</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Leo</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Virgo</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Libra</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Scorpio</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Sagittarius</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Capricorn</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Aquarius</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <button
                                            class="btn bg-white text-gray-dark box-shadow font-18 btn-block mb-3">Pisces</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="pets mt-4">
                        <div class="row">
                            <div class="col-md-2">
                                <p class="m-0 p-0 font-18">Pets</p>
                            </div>
                            <div class="col-md-10">
                                <div class="d-inline-block mx-3 text-center">
                                    <a href="#">
                                        <span class="bg-white text-dark d-inline-block px-3 py-2 rounded box-shadow">
                                            <i class="fas fa-cat font-25"></i>
                                        </span>
                                        <p class="font-20 text-dark">Cats</p>
                                    </a>
                                </div>
                                <div class="d-inline-block mx-3 text-center">
                                    <a href="#">
                                        <span class="bg-white text-dark d-inline-block px-3 py-2 rounded box-shadow">
                                            <i class="fas fa-dog font-25"></i>
                                        </span>
                                        <p class="font-20 text-dark">Dogs</p>
                                    </a>
                                </div>
                                <div class="d-inline-block mx-3 text-center">
                                    <a href="#">
                                        <span class="bg-white text-dark d-inline-block px-3 py-2 rounded box-shadow">
                                            <i class="fas fa-dove font-25"></i>
                                        </span>
                                        <p class="font-20 text-dark">Birds</p>
                                    </a>
                                </div>
                                <div class="d-inline-block mx-3 text-center">
                                    <a href="#">
                                        <span class="bg-white text-dark d-inline-block px-3 py-2 rounded active">
                                            <i class="fas fa-fish font-25"></i>
                                        </span>
                                        <p class="font-20 text-dark">Fish</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="apply-filter py-3">
                        <div class="text-center">
                            <button class="btn btn-md btn-success mr-3">Apply filters</button>
                            <button class="btn btn-md btn-danger" @click.prevent="showFilter = false">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="listing-area pad-tb-50">
                    <div class="list-view d-none d-md-block" v-if="showListings">
                        <div class="row">
                            <div class="col-md-6" 
                                v-for="listing in listings.data" 
                                :key="listing.listing_id"
                            >
                                <div class="listing-single mar-bot-20 shadow-sm">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <div class="listing-img">
                                                <a :href="listing.listing_url">
                                                    <div class="img-text clearfix w-100 p-2">
                                                        <div class="float-right text-light">
                                                            <span class="mr-2 font-14 color-main-text">{{ listing.created_at }}</span> <br />
                                                            <span
                                                                class="btn btn-warning p-0 px-3 mt-2 text-light">New</span>
                                                        </div>
                                                        <div class="float-left">
                                                            <span class="font-25 text-light">
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <img :src="listing.image" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="listing-content">
                                                <h2 class="font-18 mb-2">{{ listing.title }}</h2>
                                                <p class="font-14"><span class="color-main-text">{{ listingType }}</span> |
                                                    <span>{{ listing.location.location }}</span></p>
                                                <div class="listing-user clearfix">
                                                    <img :src="listing.user.avatar" alt=""
                                                        class="rounded-circle float-left">
                                                    <div class="float-left ml-2 mt-1">
                                                        <span
                                                            class="mb-2 d-inline-block font-weight-bold">{{ listing.user.name }}</span>
                                                        <br>
                                                        <span class="d-inline-block">{{ listing.user.age }}</span>
                                                    </div>
                                                </div>
                                                <div class="listing-contact mt-1">
                                                    <p class="font-14 mb-3">Contact {{ listing.user.name }}</p>
                                                    <a href="#"><i
                                                            class="fab fa-facebook-f icon facebook font-25 mr-2"></i></a>
                                                    <a href="#"><i
                                                            class="fab fa-twitter icon twitter font-25 mr-2"></i></a>
                                                    <a href="#"><i
                                                            class="fab fa-instagram icon instagram font-25 mr-2"></i></a>
                                                    <a href="#"><i
                                                            class="fas fa-phone-alt icon phone-book font-25 mr-2"></i></a>
                                                    <a href="#"><i
                                                            class="far fa-comments icon comments font-25 mr-2"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="listing-pricing text-center mx-3 mt-4">
                                                <p class="font-12 color-main-text"><sup>$</sup> {{ listing.rent.rent }} <sup>{{ listing.rent.currency }}</sup></p>
                                                <p class="font-12 mb-3">per month</p>
                                                <span><i class="fas fa-calendar-alt font-18 color-main-text"></i></span>
                                                <p class="font-12">Move-in Date:</p>
                                                <p class="font-12 mb-3">{{ listing.move_date }}</p>
                                                <a href="#"
                                                    class="btn font-14 color-main-bg text-light btn-block">view</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="grid-view">
                        <div class="row">
                            <div class="col-md-4 col-lg-3"
                                v-for="listing in listings"
                                :key="listing.listing_id"
                            >
                                <a href="#">
                                    <div class="listing-single bg-white mar-bot-20 shadow-sm">
                                        <div class="listing-img">
                                            <div class="img-text-top clearfix w-100 px-3 py-2">
                                                <div class="float-left">
                                                    <span class="font-25 text-light">
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </span>
                                                </div>
                                                <div class="float-right text-light">
                                                    <span class="mr-2 font-14">6 Days Ago</span> <br />
                                                    <span class="btn btn-warning p-0 px-3 mt-2 text-light">New</span>
                                                </div>
                                            </div>
                                            <div class="img-text-bottom clearfix w-100 p-2">
                                                <div class="float-left text-light">
                                                    <span class="font-30 font-weight-bold">
                                                        <sup class="font-20">$</sup> {{ listing.rent.rent }} <sup class="font-20">{{ listing.rent.currency }}</sup>
                                                    </span>
                                                    <span class="font-20 font-weight-bold">per month</span>
                                                </div>
                                                <div class="float-right text-light listing-user">
                                                    <img :src="listing.user.avatar" alt="" class="rounded-circle"
                                                        width="100px" height="100px">
                                                    <div class="mb-2 listing-user-text">
                                                        <span
                                                            class="mb-2 d-inline-block font-weight-bold mr-2">Angelia</span>
                                                        <span class="d-inline-block font-weight-bold">28</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <img :src="listing.image" alt="">
                                        </div>
                                        <div class="listing-contact mt-1 pb-2 pl-2">
                                            <h2 class="font-16 my-1 text-dark">{{ listing.title }}</h2>
                                            <p class="font-12 mb-3 ">
                                                <span class="color-main-text">{{ listing.type }}</span> | <span
                                                    class="text-dark">{{ listing.location.location }}</span>
                                            </p>
                                            <div class="text-center">
                                                <a href="#"><i
                                                        class="fab fa-facebook-f icon facebook font-25 mr-2"></i></a>
                                                <a href="#"><i class="fab fa-twitter icon twitter font-25 mr-2"></i></a>
                                                <a href="#"><i
                                                        class="fab fa-instagram icon instagram font-25 mr-2"></i></a>
                                                <a href="#"><i
                                                        class="fas fa-phone-alt icon phone-book font-25 mr-2"></i></a>
                                                <a href="#"><i
                                                        class="far fa-comments icon comments font-25 mr-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <div class="not-found" v-else>
                        <p class="p-5 border text-center main-color-text">Not Found</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <pagination 
                    :data="listings" 
                    align="center"
                    :show-disabled="true"
                    @pagination-change-page="getListings" 
                >
                    <span slot="prev-nav">&lt; Previous</span>
	                <span slot="next-nav">Next &gt;</span>
                </pagination>
            </div>
        </div>
    </div>
</template>

<script>
    // import PlaceAutocomplete from '../plugin/PlaceAutocomplete'
    import Pagination from 'laravel-vue-pagination'

   
    export default {
         components: {
            // PlaceAutocomplete,
            Pagination
        },
        props: {
            type: String,
            // searchLocation: {
            //     type: Object,
            //     default: function () {
            //         return {
            //             location: 'anywhere',
            //             lat: null,
            //             lng: null
            //         }
            //     }
            // },
        },
        data() {
            return{
                listings: {},
                total: null,
                from: null,
                to: null,
                listingType: '',
                sortBy: 'latest',
                location: {
                    location: '',
                    lat: null,
                    lng: null
                },
                showFilter: false,
                showListings: true
            }
        },
        methods: {
            changeListings(type){
                window.location.href = `/lists/${type}`;
            },
            sortingBy(sortBy){
                this.sortBy = sortBy;
                this.getListings();
            },
            // placeSelected(place){
            //     this.location.location = place.label;
            //     this.location.lng = place.x;
            //     this.location.lat = place.y;
            //     this.getListings();
            // },
            // cancelled(){
            //     this.location.location = '';
            //     this.location.lat = null;
            //     this.location.lng = null;
            // },
            getListings(page = 1){
                const key = this.$dlg.mask()
                axios.get(`/api/get-listings/${this.listingType}/${this.sortBy}/${this.location.lat}/${this.location.lng}?page=${page}`)
                    .then( res => {
                        if(res.data.meta.total > 0) {
                            this.listings = res.data;
                            this.total = res.data.meta.total;
                            this.from = res.data.meta.from;
                            this.to = res.data.meta.to;
                            this.showListings = true;
                        }else{
                            this.showListings = false;
                        }
                        this.$dlg.close(key)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
    
        },
        created() {
            this.listingType = this.type;
            // this.location = this.searchLocation;
            this.getListings();
        }
    }
</script>

<style scoped>
    .col >>> .page-item.pagination-page-nav.active {
        border: none !important;
    }
    .col >>> .page-item.pagination-page-nav.active .page-link {
       border: 1px solid #ca2525 !important;
        color: #fff !important;
        background: #ca2525 !important;
    }
    .col >>> .page-item.pagination-page-nav .page-link:focus {
       box-shadow: none !important;
    }
</style>