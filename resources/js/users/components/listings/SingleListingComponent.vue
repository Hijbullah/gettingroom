<template>
    <div v-if="showData">
        <section v-if="listing.images && listing.images.length > 0">
             <swiper :options="swiperOption">
                <swiper-slide v-for="(image, index) in listing.images" :key="index">
                    <img :src="image" alt="images">
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
            </swiper>
        </section>
        <section class="short-manu-bar bg-dark d-none d-md-block">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<nav class="navbar nav nav-fill">
							<li><a href="#" class="text-white">Description</a></li>
							<li><a href="#" class="text-white">Amenities</a></li>
							<li><a href="#" class="text-white">Roommate preference</a></li>
							<li><a href="#" class="text-white">$ USD per month</a></li>
						</nav>
					</div>
				</div>
			</div>
		</section>
        <section class="single-user-listing p-2 mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-12 order-md-0 order-1">
                                <div class="user-listing-button p-4 mb-3 d-flex text-center" v-if="authId && authId == listing.user.id">
                                    <a href="" class="btn w-25 btn-info text-white p-2 mr-3">Edit Listing</a>
                                    <a href="" class="btn w-25 color-main-bg text-white p-2">Delete Listing</a>
                                </div>
                                <div class="user-listing-info bg-white p-4 mb-3">
                                    <div class="d-flex">
                                        <p class="text-dark text-left flex-grow-1">{{ listing.created_at }} <span
                                                class="color-main-bg text-white py-1 px-2 ml-2 d-inline-block font-12 rounded">NEW</span></p>
                                        <p class="text-right d-inline-block mr-2">
                                            <span class=" align-top font-20 font-weight-bold">$</span>
                                            <span class="font-30 color-main-text">{{ listing.rent.rent }}</span>
                                        </p>
                                        <p class="d-inline-block text-center">
                                            <span class="font-25">{{ listing.rent.currency }}</span> <br />
                                            <span class="font-12">per month</span>
                                        </p>
                                    </div>
                                    <div class="title w-md-60 mb-4">
                                        <h3 class="font-22">{{ listing.title }}</h3>
                                    </div>
                                    <div class="location my-2">
                                        <p class="pb-1 font-weight-bold font-18">
                                            <span class="color-main-text font-20 mr-2">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                            Location
                                        </p>
                                        <p class="pb-1 font-weight-bold font-18">{{ listing.location.location }}</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-3" v-if="listing.duration.move_date">
                                            <p class="text-center py-3 border">
                                                <span class="font-weight-bold d-block mb-3">Move Date</span>
                                                <span>{{ listing.duration.move_date }}</span>

                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3" v-if="listing.duration.leave_date">
                                            <p class="text-center py-3 border">
                                                <span class="font-weight-bold d-block mb-3">Leave Date</span>
                                                <span>{{ listing.duration.leave_date }}</span>

                                            </p>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3" v-if="listing.duration.minimum_stay">
                                            <p class="text-center py-3 border">
                                                <span class="font-weight-bold d-block mb-3">Minimum Stay</span>
                                                <span>{{ listing.duration.minimum_stay }}</span>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-listing-description bg-white p-4 mb-3">
                                    <p class="font-16 mb-2 font-weight-bold">
                                        <span class="color-main-text mr-2"><i class="fas fa-receipt font-25"></i></span>
                                        Description</p>
                                    <p class="font-16 text-justify text-break">{{ listing.description }}</p>
                                    <hr>

                                    <div class="household" v-if="listing.amenities && listing.amenities.length > 0">
                                        <p class="font-16 mb-3 font-weight-bold">
                                            <span class="color-main-text mr-2">
                                                <i class="fas fa-home font-25"></i>
                                            </span>
                                            Amenities
                                        </p>
                                        <div class="row">
                                            <div class="col-3 mb-3" v-for="(item, index) in listing.amenities" 
                                                :key="index"
                                            >
                                                <p class="text-center p-2 border h-100 bg-light rounded">{{ item }}</p> 
                                            </div>
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
                                        <p class="font-16 mb-2 font-weight-bold">
                                            Life Style</p>
                                        <p class="font-16 text-justify" 
                                            v-for="(value, key) in listing.lifeStyle" 
                                            :key="key"
                                        >
                                            {{ key }}: {{ value }} 
                                        </p>

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
                                    <div class="pets" v-if="listing.pets && listing.pets.have && listing.pets.have.length > 0">
                                        <p class="font-16 my-3 font-weight-bold">
                                            Pets I have: 
                                        </p>
                                        <div class="row">
                                            <div class="col-3 mb-3" v-for="(item, index) in listing.pets.have" 
                                                :key="index"
                                            >
                                                <p class="text-center p-2 border h-100 bg-light rounded">{{ item }}</p> 
                                            </div>
                                        </div>

                                    </div>
                                    <div class="pets" v-if="listing.pets && listing.pets.prefer && listing.pets.prefer.length > 0">
                                        <p class="font-16 my-3 font-weight-bold">
                                        Prefer Pets: 
                                        </p>
                                        <div class="row">
                                            <div class="col-3 mb-3" v-for="(item, index) in listing.pets.prefer" 
                                                :key="index"
                                            >
                                                <p class="text-center p-2 border h-100 bg-light rounded">{{ item }}</p> 
                                            </div>
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
                                            <span class="badge badge-success profile-check"><i class="fas fa-check"></i></span>
                                        </a>
                                    </div>
                                    <div class="single-user-info py-3">
                                        <a :href="listing.user.profile_url" class="text-success">
                                            <h3 class="font-25">{{ listing.user.name }}</h3>
                                        </a>
                                        <p class="font-20">{{ listing.user.age }}</p>
                                        <p class="font-18 color-main-text">{{ listingType }}</p>
                                    </div>
                                    <div class="listing-user-sms-block p-3 ">
                                        <textarea name="" id="" cols="20" rows="5" class="form-control noresize text-left"></textarea>
                                    </div>
                                    <button class="btn btn-success w-50">
                                        Send Message
                                    </button>
                                    
                                </div>
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="update-block text-center p-1 my-4">
                                            <a href="#" class="text-dark">
                                                <h3 class="font-18 text-uppercase"> 
                                                    <i class="fas fa-phone-alt mr-1"></i> UPGRADE TO VIEW phone
                                                </h3>
                                            </a>
                                            <p class="font-18 m-2 text-secondary font-weight-bold">or</p>
                                            <p class="font-16">Find <a href="#" class="text-success">{{ listing.user.name }}</a> on Social Media</p>
                                        </div>
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
						<p>Mhamudul Hasan</p>
					</div>
					<div class="col-12">
						<div class="d-flex justify-content-around py-2">
							<div class="text-center py-3 px-2">
								<a href="" class="d-inline-block text-dark font-18 color-main-text">
									<i class="far fa-comment font-30"></i> <br /> Message</a>
							</div>
							<div class="text-center py-3 px-2">
								<a href="" class="d-inline-block text-dark font-18">
									<i class="fas fa-phone-alt font-30"></i> <br /> Call</a>
							</div>
							<div class="text-center py-3 px-2">
								<a href="" class="d-inline-block text-dark font-18">
									<i class="far fa-comments font-30"></i> <br /> SMS</a>
							</div>
							<div class="text-center py-3 px-2">
								<a href="" class="d-inline-block text-dark font-18">
									<i class="fas fa-icons font-30"></i> <br />  Social</a>
							</div>
							<div class="text-center py-3 px-2">
								<a href="" class="d-inline-block text-dark font-18 color-main-text">
									<i class="fas fa-ellipsis-v font-30"></i> <br />  Other</a>
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

    export default {
         components: {
            swiper,
            swiperSlide
        },
        props: ['type', 'listingId', 'authId'],
        data() {
            return{
                listing: {},
                showData: false,
                swiperOption: {
                    slidesPerView: 2,
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
    				      spaceBetween: 10
    				    },
    				    // when window width is >= 480px
    				    667: {
    				      slidesPerView: 2,
    				      spaceBetween: 10
    				    },
    				    576: {
    				      slidesPerView: 1,
    				      spaceBetween: 10
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
    
        },
        computed: {
            listingType() {
                switch(this.type){
                    case 'NeedRoom':
                        return 'Looking for a room!';
                        break;
                    case 'OfferRoom':
                        return 'Offering a room!';
                        break;
                    case 'NeedApartment':
                        return 'Looking for an Apartment!';
                        break;
                    default:
                        return 'Offering an entire place!';
                }
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
    height:300px;
}
.swiper-slide {
    height:300px;
}
.swiper-slide img {
    width: 100%;
    height:100%;
}
.swiper-button-next, .swiper-button-prev{
    color: #ca2525;
}
</style>
