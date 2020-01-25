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
                            :class="type == 'offer_room' ? 'active' : '' " 
                            @click.prevent="changeListings('offerrooms')"
                        >a room </a>
                        <a href="#" class=" mb-2" 
                            :class="type == 'need_apartment' ? 'active' : '' "  
                            @click.prevent="changeListings('needapartments')"
                        >an entire place </a>

                        <a href="#" class=" mb-2" 
                            :class="type == 'need_room' ? 'active' : '' " 
                            @click.prevent="changeListings('needrooms')"
                        >a roommate </a>
                        <a href="#" class=" mb-2"
                            :class="type == 'offer_apartment' ? 'active' : '' " 
                            @click.prevent="changeListings('offerapartments')"
                        >a tenant </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery budget mt-2 mb-5">
            <div class="row">
                <div class="col-md-2 col-12">
                    <p class="m-0 p-0 font-18">Budget</p>
                </div>
                <div class="col-md-6 col-11">
                    <vue-slider 
                        v-model= "priceRange" 
                        :min= "0" 
                        :max= "5000"
                        :enable-cross= "false"
                        :height= "5"
                        :dotSize= "16"
                        :lazy="true"
                        @change="priceChange"
                    ></vue-slider>
                    <div class="range clearfix mt-2">
                        <p class="float-left font-18">$ {{ priceRange[0] }}</p>
                        <p class="float-right font-18">$ {{ priceRange[1] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="filer-control bg-white px-3 py-3">
            <div class="row">
                <div class="col-md-2 col-lg-4">
                    <div class="filter-area mb-sm-3 mb-3">
                        <a href="#" class="font-18 color-main-text" @click.prevent="showFilter = true">
                            <i class="fas fa-sliders-h "></i> Filters
                        </a>
                        <a href="/listingNew" class="font-16 btn btn-outline-success text-center float-right d-sm-none">
                            <i class="fas fa-plus"></i>
                            Add New Listing
                        </a>
                        <span v-if="total" class="font-16 mx-3 d-none d-sm-inline-block d-md-none d-lg-inline-block float-right float-md-none">Total: {{ total }} | showing: ({{ from }} - {{to}})</span>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 d-none d-sm-block">
                    <a href="/listingNew" class="font-20 d-block py-2 btn btn-outline-success text-center">
                        <i class="fas fa-plus"></i>
                        Add New Listing
                    </a>
                </div>

                <div class="col-md-2 col-lg-2 d-none d-md-block text-right">
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
                    <div v-if="showListings">
                        <div class="list-view d-none d-lg-block" >
                            <div class="row">
                                <div class="col-md-6" 
                                    v-for="listing in listings" 
                                    :key="listing.listing_id"
                                >
                                    <div class="listing-single mar-bot-20 shadow-sm">
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <div class="listing-img">
                                                    <a :href="listing.listing_url">
                                                        <div class="img-text clearfix w-100 p-2">
                                                            <div class="float-right text-light">
                                                                <!-- <span class="mr-2 font-14 color-main-text">{{ listing.created_at }}</span> <br /> -->
                                                                <span class="mr-2 mt-2 d-inline-block font-weight-bold font-14 color-main-text">Check Availability</span> <br />
                                                                <!-- <span class="btn btn-warning p-0 px-3 mt-2 text-light">New</span> -->
                                                            </div>
                                                            <div class="float-left">
                                                                <span class="font-25 text-light">
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <img :src="listing.image" :alt="listing.title">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="listing-content">
                                                    <a :href="listing.listing_url">
                                                        <h2 class="font-16 mb-2 text-dark">{{ listing.title }}</h2>
                                                    </a>
                                                    <p class="font-14"><span class="color-main-text">{{ listingType }}</span> |
                                                        <span>{{ listing.location.location }}</span></p>
                                                    <div class="listing-user clearfix">
                                                        <a :href="listing.user.profile">
                                                            <img :src="listing.user.avatar" :alt="listing.user.name" class="rounded-circle float-left">
                                                        </a>    
                                                        <div class="float-left ml-2 mt-1">
                                                            <span
                                                                class="mb-2 d-inline-block font-weight-bold">{{ listing.user.name }}</span>
                                                            <br>
                                                            <span class="d-inline-block">{{ listing.user.age }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="listing-contact mt-1">
                                                        <p class="font-14 mb-3">Contact {{ listing.user.name }}</p>
                                                        <a :href="listing.listing_url" v-if="listing.user.verified.facebook"><i class="fab fa-facebook-f icon facebook font-16"></i></a>
                                                        <a :href="listing.listing_url" v-if="listing.user.verified.twitter"><i class="fab fa-twitter icon twitter font-16"></i></a>
                                                        <a :href="listing.listing_url" v-if="listing.user.verified.instagram"><i class="fab fa-instagram icon instagram font-16"></i></a>
                                                        <a :href="listing.listing_url" v-if="listing.user.verified.linkedin"><i class="fab fa-linkedin-in icon linkedin font-16"></i></a>
                                                        <a :href="listing.listing_url" v-if="true"><i class="far fa-comments icon comments font-16"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="listing-pricing text-center mx-3 mt-4">
                                                    <p class="color-main-text pricing">
                                                        <span class="dollar">$</span>
                                                        <span class="font-weight-bold font-16">{{ listing.rent.rent }}</span>
                                                        <span class="dollar">{{ listing.rent.currency }}</span>
                                                    </p>
                                                    <p class="font-12 mb-3">per month</p>
                                                    <span><i class="fas fa-calendar-alt font-18 color-main-text"></i></span>
                                                    <p class="font-12">Move-in Date:</p>
                                                    <p class="font-12 mb-3">{{ listing.move_date }}</p>
                                                    <a :href="listing.listing_url"
                                                        class="btn font-14 color-main-bg text-light btn-block">view</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-view d-block d-lg-none">
                            <div class="row">
                                <div class="col-12"
                                    v-for="listing in listings"
                                    :key="listing.listing_id"
                                >
                                    <div class="listing-single bg-white mar-bot-20 shadow-sm">
                                        <div class="listing-img">
                                            <div class="img-text-top clearfix w-100 px-3 py-2">
                                                <div class="float-left">
                                                    <span class="font-25 text-light">
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </span>
                                                </div>
                                                <div class="float-right text-light">
                                                    <a :href="listing.listing_url" class="text-white font-weight-bold">
                                                        <span class="mr-2 d-inline-block mt-2 font-14">Check Availability</span>
                                                    </a>
                                                    <!-- <span class="mr-2 font-14">{{ listing.created_at }}</span> <br /> -->
                                                    <!-- <span class="btn btn-warning p-0 px-3 mt-2 text-light">New</span> -->
                                                </div>
                                            </div>
                                            <div class="img-text-bottom clearfix w-100 p-2">
                                                <div class="float-left text-light">
                                                    <p class="pricing">
                                                        <span class="dollar">$</span>
                                                        <span class="font-weight-bold font-40 price">{{ listing.rent.rent }}</span>
                                                        <span class="dollar">{{ listing.rent.currency }}</span>
                                                        <span class="font-16 font-weight-bold">per month</span>
                                                    </p>
                                                </div>
                                                <div class="float-right text-light listing-user">
                                                    <a :href="listing.user.profile">
                                                        <img :src="listing.user.avatar" alt="" class="rounded-circle" width="100px" height="100px">
                                                    </a>    
                                                    <div class="mb-2 listing-user-text">
                                                        <span
                                                            class="mb-2 d-inline-block font-weight-bold mr-2">{{ listing.user.name }}</span>
                                                        <span class="d-inline-block font-weight-bold">{{ listing.user.age }}</span>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <a :href="listing.listing_url">
                                                <img :src="listing.image" alt="">
                                            </a>
                                        </div>
                                        <div class="listing-contact mt-1 pb-2 pl-2 clearfix">
                                            <div class="float-sm-left float-md-left">
                                                <a :href="listing.listing_url">
                                                    <h2 class="font-18 my-2 text-dark">{{ listing.title }}</h2>
                                                </a>
                                                <p class="font-12 mb-3 ">
                                                    <span class="color-main-text">{{ listingType }}</span> | <span
                                                        class="text-dark">{{ listing.location.location }}</span>
                                                </p>
                                            </div>
                                            <div class="text-center text-sm-right float-sm-right float-md-right mt-4 mr-2">
                                                <a :href="listing.listing_url" v-if="listing.user.verified.facebook"><i class="fab fa-facebook-f icon facebook font-25 mr-2"></i></a>
                                                <a :href="listing.listing_url" v-if="listing.user.verified.twitter"><i class="fab fa-twitter icon twitter font-25 mr-2"></i></a>
                                                <a :href="listing.listing_url" v-if="listing.user.verified.instagram"><i class="fab fa-instagram icon instagram font-25 mr-2"></i></a>
                                                <a :href="listing.listing_url" v-if="listing.user.verified.phone"><i class="fas fa-phone-alt icon phone-book font-25 mr-2"></i></a>
                                                <a :href="listing.listing_url" v-if="true"><i class="far fa-comments icon comments font-25 mr-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="not-found" v-else>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                    <div class="card radius-10">
                                        <div class="card-body p-5">
                                            <div class="py-3 heading font-20 text-dark font-weight-bold rounded text-center mb-3" style="background: rgb(236, 236, 236)">
                                                Oops! We couldn't find anything
                                            </div> 
                                            <h4 class="font-18 mb-2">Expand area of your search</h4>
                                            <ul style="list-style: none">
                                                <li>- Search nearby neighborhoods</li> 
                                                <li>- Refrain from using zip codes or exact addresses</li> 
                                            </ul> 
                                            <h4 class="font-18 mb-2">Expand your search criteria</h4> 
                                            <ul style="list-style: none">
                                                <li>- Increase filters ranges</li> 
                                                <li>- Uncheck unnecessary filters</li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
         components: {
            VueSlider
        },
        props: {
            type: String,
            lat: String,
            lng: String
         
        },
        data() {
            return{
                listings: [],
                page: 2,
                total: null,
                from: null,
                to: null,
                loadable: false,
                priceRange: [0,5000],
                sortBy: 'latest',
                showFilter: false,
                showListings: true
            }
        },
        computed: {
            listingType(){
               switch(this.type){
                    case 'need_room':
                        return 'Roommate';
                        break;
                    case 'offer_room':
                        return 'Private Room';
                        break;
                    case 'need_apartment':
                        return 'Entire Place';
                        break;
                    default:
                        return 'Tenant'
               }
            },
        },
        methods: {
            changeListings(type){
                window.location.href = `/lists/${type}`;
            },
            sortingBy(sortBy){
                this.sortBy = sortBy;
                this.getListings();
            },
            getListings(){
                const key = this.$dlg.mask('Loading...',{language: 'en'});
                axios.get(`/api/get-listings/${this.type}/${this.sortBy}/${this.priceRange[0]}/${this.priceRange[1]}/${this.lat}/${this.lng}`)
                    .then( ({ data }) => {
                        if(data.meta.total > 0) {
                            data.data.map(item => {
                                this.listings.push(item);
                            });
                            this.total = data.meta.total;
                            this.from = data.meta.from;
                            this.to = data.meta.to;
                            data.links.next ? this.loadable = true : false;
                            this.showListings = true;
                        }else{
                            this.showListings = false;
                        }
                        this.$dlg.close(key);
                    });

            },
            priceChange(price){
                this.priceRange = price;
                this.getListings();
            },
            loadMore() {
                const key = this.$dlg.mask('Loading...',{language: 'en'});
                axios.get(`/api/get-listings/${this.type}/${this.sortBy}/${this.priceRange[0]}/${this.priceRange[1]}/${this.lat}/${this.lng}?page=${this.page}`)
                    .then( ({ data }) => {
                        if(data.data.length > 0) {
                            data.data.map(item => {
                                this.listings.push(item);
                            });
                            this.page += 1;
                            data.links.next ? this.loadable = true: false;

                        }else{
                            this.loadable = false;
                            this.$dlg.toast('No more Listings!', {
                                messageType: 'error',
                                language: 'en',
                                closeTime: 1 // auto close dialog time(second)
                            });
                        }
                        this.$dlg.close(key);
                    });
                   
            }, 
            scrollBottom(){
                window.onscroll = () => {
                    let bottomOfWindow = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop) + window.innerHeight === document.documentElement.offsetHeight;
                    if (bottomOfWindow && this.loadable) {
                        this.loadMore();
                    }
                }
                    
            }
            
    
        },
        created() {
            this.getListings();
        },
        mounted(){
            this.scrollBottom();
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
    .pricing{
        word-spacing: -4px;
    }
    .list-view .dollar{
        font-size: 10px;
        vertical-align: .33vw;
    }
    .grid-view .dollar{
        font-size: 18px;
        vertical-align: 1.88vw;
    }
    .budget >>> .vue-slider-process {
        background-color: #21880e;
    }
    .budget >>> .vue-slider-dot-tooltip-inner {
        border-color: #3e983e;
        background-color: #3e983e;
    }

</style>