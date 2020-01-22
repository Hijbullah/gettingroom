<template>
    <div v-if="showData">
        <section v-if="listing.images && listing.images.length > 0">
            <div class="listing-image-gellery">
                <div class="intro-left d-md-none">
                   <span class="font-25 text-light">
                        <i class="fas fa-star-half-alt"></i>
                    </span>
                </div>
                <div class="intro-right d-md-none">
                    <span class="mr-2 font-14 text-white">{{ listing.created_at }}</span> <br />
                    <span class="btn btn-warning p-0 px-3 mt-2 text-light">New</span>
                </div>
                <swiper :options="swiperOption">
                    <swiper-slide v-for="(image, index) in listing.images" :key="index">
                        <img :src="image" alt="images">
                    </swiper-slide>
                    <div class="swiper-button-prev" slot="button-prev"></div>
                    <div class="swiper-button-next" slot="button-next"></div>
                </swiper>
               <div class="pricing d-inline-block clearfix d-md-none">
                    <div class="float-left">
                        <span class="dollar text-white">$</span>
                        <span class="font-weight-bold font-30 text-white">{{ listing.rent.rent }}</span>
                    </div>
                    <div class="float-right ml-1 price-currency">
                        <p class="text-white font-20">{{ listing.rent.currency }}</p>
                        <p class="per-month text-white">per month</p>
                    </div>
                </div>
                <div class="info bg-white p-2 d-md-none">
                    <h2 class="font-18 text-dark mb-1">{{ listing.title }}</h2>
                    <p class="font-16"><span class="color-main-text">{{ listingType }}</span> by {{ listing.user.name }}</p>
                </div>
            </div>
        </section>
        <section class="short-manu-bar bg-dark d-none d-md-block">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<nav class="navbar nav nav-fill">
							<li><a href="#listing-description" class="text-white">Description</a></li>
							<li><a href="#" class="text-white">Amenities</a></li>
							<li><a href="#" class="text-white">Roommate preference</a></li>
							<li><a href="#" class="text-white">$USD per month</a></li>
						</nav>
					</div>
				</div>
			</div>
		</section>
        <section class="single-user-listing mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="user-listing-button mb-5 d-flex text-center" v-if="authId && authId == listing.user.id">
                            <a :href="listing.edit_url" class="btn btn-sm btn-info text-white p-2 mr-3">Edit Listing</a>
                            <a href="#" @click.prevent="deleteListing" class="btn btn-sm btn-success text-white p-2">Delete Listing</a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-12 order-md-0 order-1">
                        <div class="user-listing-info bg-white p-4 mb-3 d-none d-md-block">
                            <div class="d-flex">
                                <p class="text-dark text-left flex-grow-1">{{ listing.created_at }} <span
                                        class="color-main-bg text-white py-1 px-2 ml-2 d-inline-block font-12 rounded">NEW</span></p>
                                
                                <div class="pricing clearfix">
                                    <div class="float-left">
                                        <span class="dollar color-main-text">$</span>
                                        <span class="font-weight-bold font-30 color-main-text">{{ listing.rent.rent }}</span>
                                    </div>
                                    <div class="float-right ml-1 price-currency">
                                        <p class="color-main-text font-20">{{ listing.rent.currency }}</p>
                                        <p class="per-month">per month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="title">
                                <h3 class="font-22">{{ listing.title }}</h3>
                            </div>
                            <div class="location my-3">
                                <p class="font-weight-bold text-muted font-18">
                                    <span class="color-main-text font-18 mr-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    Location
                                </p>
                                <p class="font-16">{{ listing.location.location }}</p>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4" v-if="listing.duration.move_date">
                                    <p class="text-left p-2 mb-2 mb-md-0 duration">
                                        <span class="font-weight-bold d-block mb-1" v-if="type == 'NeedRoom' || type == 'NeedApartment'">Move Date</span>
                                        <span class="font-weight-bold d-block mb-1" v-else>Available Date</span>
                                        <span>{{ listing.duration.move_date }}</span>

                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4" v-if="listing.duration.minimum_stay">
                                    <p class="text-left p-2 duration">
                                        <span class="font-weight-bold d-block mb-1">Minimum Stay</span>
                                        <span>{{ listing.duration.minimum_stay }}</span>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-none mb-2">
                            <div class="bg-white" v-if="listing.duration.move_date">
                                <p class="text-left p-2 mb-2 mb-md-0 duration">
                                    <span class="font-weight-bold d-block mb-1" v-if="type == 'NeedRoom' || type == 'NeedApartment'">Move Date</span>
                                    <span class="font-weight-bold d-block mb-1" v-else>Available Date</span>
                                    <span>{{ listing.duration.move_date }}</span>

                                </p>
                            </div>
                            <div class="bg-white" v-if="listing.duration.minimum_stay">
                                <p class="text-left p-2 mb-2 duration">
                                    <span class="font-weight-bold d-block mb-1">Minimum Stay</span>
                                    <span>{{ listing.duration.minimum_stay }}</span>
                                </p>
                            </div>
                            <div class="bg-white p-2">
                                <p class="font-weight-bold text-muted font-16">
                                    <span class="color-main-text font-16 mr-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    Location
                                </p>
                                <p class="font-16">{{ listing.location.location }}</p>
                            </div>
                        </div>
                        <div class="user-listing-description bg-white p-4 mb-3">
                            <p class="font-16 mb-2 font-weight-bold" id="listing-description">
                                <span class="color-main-text mr-2"><i class="fas fa-receipt font-25"></i></span>
                                Description</p>
                            <p class="font-16 text-justify text-break pre-line">{{ listing.description }}</p>
                            <div class="household" v-if="listing.amenities && listing.amenities.length > 0">
                                <hr>
                                <p class="font-16 mb-3 font-weight-bold">
                                    <span class="color-main-text mr-2">
                                        <i class="fas fa-home font-25"></i>
                                    </span>
                                    Amenities
                                </p>
                                <div class="amenities text-center">
                                    <p class="text-center d-inline-block m-3"
                                        style="width: 90px;"  
                                        v-for="(item, index) in listing.amenities" 
                                        :key="index"
                                    >
                                        <span class="d-inline-block mb-2" style="height: 30px; width:30px;"><img class="w-100 h-100" :src="item|getAmenitiesIcon"></span>
                                        <span class="name d-block font-16" style="line-height:16px;">{{ item }}</span>
                                    </p> 
                                </div>
                            </div>
                            <div class="household" v-if="listing.household && Object.keys(listing.household).length > 0">
                                <hr>
                                <p class="font-16 mb-2 font-weight-bold">
                                    <span class="text-success mr-2"><i class="fas fa-home font-25"></i></span>
                                    HourseHold</p>
                                <p class="font-16 text-justify" 
                                    v-for="(value, key) in listing.household" 
                                    :key="key"
                                >
                                    {{ 'Household ' + key }}: {{ value }} 
                                </p>

                            </div>
                            <div class="residence" v-if="listing.residence && Object.keys(listing.residence).length > 0">
                                <hr>
                                <p class="font-16 mb-2 font-weight-bold">
                                    <span class="text-success mr-2"><i class="fas fa-home font-25"></i></span>
                                    Residence</p>
                                <p class="font-16 text-justify" 
                                    v-for="(value, key) in listing.residence" 
                                    :key="key"
                                >
                                    {{ key }}: {{ value }} 
                                </p>

                            </div>
                            <div class="life-style" v-if="listing.lifeStyle && Object.keys(listing.lifeStyle).length > 0">
                                <hr>
                                <p class="font-16 mb-3 font-weight-bold">
                                    Life Style</p>
                                <p class="font-16 mb-1 text-justify" 
                                    v-for="(value, key) in listing.lifeStyle" 
                                    :key="key"
                                >
                                    {{ key }}: {{ value }} 
                                </p>

                                <div class="pets" v-if="listing.pets && listing.pets.have && listing.pets.have.length > 0">
                                    <p class="font-16 my-3 font-weight-bold">
                                        Pets I have: 
                                    </p>
                                    <div class="pets-holder">
                                        <p class="text-center d-inline-block mr-3"  
                                            v-for="(item, index) in listing.pets.have" 
                                            :key="index"
                                        >
                                            <span class="font-30 color-main-text pet-icon d-block mb-1 text-center"><i :class="item | getIcon"></i></span>
                                            <span class="name d-block font-16">{{ item }}</span>
                                        </p> 
                                    </div>
                                </div>

                            </div>
                            <div class="roommate-preference" v-if="listing.roomMatePreference && Object.keys(listing.roomMatePreference).length > 0">
                                <hr>
                                <p class="font-16 mb-2 font-weight-bold">
                                    Room Mate Preference</p>
                                <p class="font-16 text-justify" 
                                    v-for="(value, key) in listing.roomMatePreference" 
                                    :key="key"
                                >
                                    {{ key }}: {{ value }} 
                                </p>

                            </div>
                            <div class="pets" v-if="listing.pets && listing.pets.prefer && listing.pets.prefer.length > 0">
                                <p class="font-16 my-3 font-weight-bold">
                                Prefer Pets: 
                                </p>

                                <div class="pets-holder">
                                    <p class="text-center d-inline-block mr-3"  
                                        v-for="(item, index) in listing.pets.prefer" 
                                        :key="index"
                                    >
                                        <span class="font-30 color-main-text pet-icon d-block mb-1 text-center"><i :class="item | getIcon"></i></span>
                                        <span class="name d-block font-16">{{ item }}</span>
                                    </p> 
                                </div>

                            </div>
                            
                        </div>
                        <div class="user-listing-map p-2 bg-white d-none">
                            <p>Map Area</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 order-md-1 order-0 d-none d-md-block">
                        <div class="user-profile bg-white py-5 px-3 mb-2 text-center">
                            <div class="single-user-img">
                                <a href="#">
                                    <img :src="listing.user.avatar" alt="" class="profile-pic">
                                </a>
                            </div>
                            <div class="single-user-info py-3">
                                <a :href="listing.user.profile_url" class="text-success">
                                    <h3 class="font-25 profile-name">
                                        {{ listing.user.name }}
                                        
                                        <span 
                                            v-if="listing.user.verified.email && listing.user.verified.phone && listing.user.verified.premium_user" 
                                            class="badge badge-success profile-check"
                                        >
                                            <i class="fas fa-check"></i>
                                        </span>
                                        
                                        <span v-else class="badge badge-secondary profile-check"><i class="fas fa-check"></i></span>
                                        
                                    </h3>
                                </a>
                                <p>
                                    <span class="font-20" v-if="listing.user.age">{{ listing.user.age }},</span>
                                    <span v-if="listing.user.gender">
                                        <span v-if="listing.user.gender == 'male'" class="font-30 color-main-text"><i class="fas fa-male"></i></span>
                                        <span v-else class="font-30 color-main-text"><i class="fas fa-female"></i></span>
                                    </span>
                                </p>
                                <p class="font-18 color-main-text font-weight-bold">{{ listingType }}</p>
                            </div>
                            <div class="listing-user-sms-block p-3 ">
                                <textarea v-model="message" rows="5" class="form-control noresize text-left"></textarea>
                            </div>
                            <button class="btn btn-success w-50" @click.prevent="sendMessage">
                                Send Message
                            </button>
                            
                        </div>
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="update-block text-center p-1 my-4">
                                    <a href="/upgrade/plans" class="text-dark" v-if="!subscribed && authId">
                                        <h3 class="font-18 text-uppercase"> 
                                            <i class="fas fa-phone-alt mr-1 color-main-text"></i> UPGRADE TO VIEW phone
                                        </h3>
                                    </a>
                                    <a href="/upgrade/plans" class="text-dark" v-else-if="!authId">
                                        <h3 class="font-18 text-uppercase"> 
                                            <i class="fas fa-phone-alt mr-1 color-main-text"></i> Show Phone Number
                                        </h3>
                                    </a>
                                    <a href="#" class="text-dark" v-else @click.prevent="showPhone = true">
                                        <h3 class="font-18 text-uppercase" v-if="!showPhone"> 
                                            <i class="fas fa-phone-alt mr-1 color-main-text"></i> Click To View Phone Number
                                        </h3>
                                        <h3 class="font-18 text-uppercase" v-else> 
                                            <i class="fas fa-phone-alt mr-1 color-main-text"></i> {{ listing.user.phone ? listing.user.phone : 'User not added!' }}
                                        </h3>
                                    </a>
                                    <p class="font-18 m-2 text-secondary font-weight-bold">or</p>
                                    <p class="font-16">Find <a href="#" class="text-success">{{ listing.user.name }}</a> on Social Media</p>
                                        <div class="text-center mt-3">
                                        <a href="#" v-if="listing.user.verified.facebook"><i class="fab fa-facebook-f icon facebook font-25 mr-2"></i></a>
                                        <a href="#" v-if="listing.user.verified.twitter"><i class="fab fa-twitter icon twitter font-25 mr-2"></i></a>
                                        <a href="#" v-if="listing.user.verified.instagram"><i class="fab fa-instagram icon instagram font-25 mr-2"></i></a>
                                        <a href="#" v-if="listing.user.verified.linkedin"><i class="fab fa-linkedin-in icon linkedin font-25 mr-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   
            </div>
        </section>
        <section class="d-md-none mini-user-block bg-white" style="bottom: 0; left: 0; position: fixed;width: 100%; z-index: 1; padding: 10px 0 ; border-radius: 15px;box-shadow: 0px -1px 13px 0px #b3b3b3 !important;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-10 m-auto">
						<p class="font-18 font-weight-bold color-main-text">{{ listing.user.name }}</p>
					</div>
					<div class="col-12">
						<div class="d-flex justify-content-around py-2">
							<div class="text-center px-2">
								<a href="/message" class="d-inline-block text-dark font-16 color-main-text">
									<i class="far fa-comment font-20"></i> <br /> Message</a>
							</div>
							<div class="text-center px-2">
								<a href="#" class="d-inline-block text-dark font-16">
									<i class="fas fa-phone-alt font-20"></i> <br /> Call</a>
							</div>
							<div class="text-center px-2">
								<a href="#" class="d-inline-block text-dark font-16">
									<i class="far fa-comments font-20"></i> <br /> SMS</a>
							</div>
							<div class="text-center px-2">
								<a href="#" class="d-inline-block text-dark font-16">
									<i class="fas fa-icons font-20"></i> <br />  Social</a>
							</div>
							<div class="text-center px-2">
								<a href="#" class="d-inline-block text-dark font-16 color-main-text">
									<i class="fas fa-ellipsis-v font-20"></i> <br />  Other</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
</template>

<script>
    import 'swiper/dist/css/swiper.css'
    import { swiper, swiperSlide } from 'vue-awesome-swiper'
    import { petsIcon, amenitiesIcons } from '../../store/store.js';

    export default {
        components: {
            swiper,
            swiperSlide
        },
        props: ['type', 'listingId', 'authId', 'subscribed'],
        data() {
            return{
                listing: {},
                message: '',
                showData: false,
                showPhone: false,
                swiperOption: {
                    slidesPerView: 4,
                    autoPlay: true,
    				navigation: {
    					nextEl: '.swiper-button-next',
    					prevEl: '.swiper-button-prev',
    				},
    				// Responsive breakpoints
    				  breakpoints: {
    				    
    				    // when window width is >= 480px
    				    992: {
    				      slidesPerView: 3,
    				    //   spaceBetween: 10
    				    },
    				    // when window width is >= 480px
    				    667: {
    				      slidesPerView: 2,
    				    //   spaceBetween: 10
    				    },
    				    576: {
    				      slidesPerView: 1,
    				    //   spaceBetween: 10
    				    },
    				   
    				  }
                }
            }
        },
        methods: {
            getListing(){
                axios.get(`/api/get-listing/${this.type}/${this.listingId}`)
                    .then( res => {
                        if(res.data != 'error'){
                            this.listing = res.data.data;
                            console.log(this.listing);
                            this.showData = true;
                        }else{
                            this.showData = false;
                            window.location.href = '/';
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            deleteListing(){
                 axios.delete(this.listing.delete_url)
                    .then( res => {
                        if(res.data == 'done'){
                             window.location.href = `/profile/${this.authId}`;
                        }else{
                            alert('something wrong in our system...')
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            sendMessage(){
                if(this.authId == null){
                    window.location.href = '/login';
                    return;
                }

                if(this.subscribed == 0){
                    window.location.href = '/upgrade/plans';
                    return;
                }
                if(!this.message){
                    alert('message can not empty');
                    return;
                }

                axios.post('/conversation/send', {
                    contact_id: this.listing.user.id,
                    text: this.message
                }).then((response) => {
                    window.location.href = '/message';
                });
            }
    
        },
        computed: {
            listingType() {
                switch(this.type){
                    case 'NeedRoom':
                        return 'Looking for a room';
                        break;
                    case 'OfferRoom':
                        return 'Offering a room';
                        break;
                    case 'NeedApartment':
                        return 'Looking for an Apartment';
                        break;
                    default:
                        return 'Offering an entire place';
                }
            }
        },
        filters: {
            getIcon: function (value) {
                let icon = petsIcon.find(item => item.name == value);
                return icon.icon;
            },
            getAmenitiesIcon: function (value) {
                let icon = amenitiesIcons.find(item => item.name == value);
                return icon.icon;
            }
        },
        created() {
            this.getListing();
        }
    }
</script>

<style scoped>
.swiper-container {
    width: 100%;
    height:350px;
}
.swiper-slide {
    height:350px;
}
.swiper-slide img {
    width: 100%;
    height:100%;
}
.swiper-button-next, .swiper-button-prev{
	color: #3e983e;
}
.icon {
    padding: 8px;
	width: 35px;
	height: 35px;
	border-radius: 5px;
}
.pricing{
    word-spacing: -4px;
}
.dollar{
    font-size: 18px;
    vertical-align: .55vw;
}
.price-currency{
    position: relative;
    padding-top: 5px;
    width: 60px;
}
.price-currency .per-month{
    position: absolute;
    bottom: -5px;
    right: 0;
    font-size: 10px;
    width: 60px;
    word-spacing: -1px;
}
@media only screen and (max-width: 575.98px) {
    .swiper-container {
        width: 100%;
        height:250px;
    }
    .swiper-slide {
        height:250px;
    }
}

@media only screen and (min-width: 576px) and (max-width: 767.98px){
    .swiper-container {
        width: 100%;
        height:300px;
    }
    .swiper-slide {
        height:300px;
    }
	
} 
</style>
