<template>
    <div class="content">
        <form  class="needs-validation" @submit.prevent="formSubmitted" @keydown="formData.onKeydown($event)">
            <div class="listing-img-upload py-2 bg-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                             <VueUploadMultipleImage 
                                :images="formData.images"
                                @imageUpload = "uploadImage"
                                @imageDelete = "deletedImage"
                            ></VueUploadMultipleImage>
                        </div>
                    </div>
                </div>
            </div>
            <div class="short-manu-bar bg-dark d-none d-md-block">
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
            </div>
            <div class="listing-form-area py-5">
                <div class="container">
                    <div class="form-basic-info">
                        <div class="row">
                            <div class="col-12">
                                <div class="basic-form mb-4">
                                    <button class="btn btn-success w-md-25 mr-3 btn-lg" @click.prevent="formSubmitted">Continue</button>
                                    <button class="btn btn-dark w-md-25 btn-lg" @click.prevent="formCancelled">Cancel</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="basic-form">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title" class="label">Title</label>
                                                <input id="title" 
                                                    name="title" 
                                                    type="text" 
                                                    class="form-control" 
                                                    v-model="formData.title"
                                                    placeholder="Title Here"
                                                >
                                                <has-error :form="formData" field="title"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <label class="label" for="location">Location</label>
                                                <PlaceAutocomplete 
                                                    @selected = 'placeSelected'
                                                    @clear = 'cancelled'
                                                />
                                                <has-error :form="formData" field="location"></has-error>
                                            </div>
                                            <h2 class="form-title">Monthly Rental Rate</h2>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="rental_currency">Currency</label>
                                                    <v-select 
                                                        :options="['USD']"
                                                        v-model="formData.rental_currency"
                                                    ></v-select>
                                                    <has-error :form="formData" field="rental_currency"></has-error>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="monthly_rent" class="label">Per Month Budget</label>
                                                    <input type="text" 
                                                        id="monthly_rent" 
                                                        class="form-control" 
                                                        name="monthly_rent" 
                                                        v-model="formData.monthly_rent"
                                                    >
                                                    <has-error :form="formData" field="monthly_rent"></has-error>
                                                </div>
                                            </div>
                                            <h2 class="form-title">Duration</h2>
                                            <div class="form-group">
                                                <button type="button" 
                                                    class="btn btn-outline-success" 
                                                    :class="[formData.is_short_term ? 'bg-success text-white' : '']" 
                                                    @click="formData.is_short_term = true"
                                                >Short Term</button>
                                                <button type="button" 
                                                    class="btn btn-outline-success" 
                                                    :class="[!formData.is_short_term ? 'bg-success text-white' : '']" 
                                                    @click="formData.is_short_term = false"
                                                >Long Term</button>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="move_date" class="label">Move Date</label>
                                                    <VueDatePicker 
                                                        placeholder="Pick Date"
                                                        button-validate="Ok"
                                                        button-cancel="Cancel"
                                                        :validate="true"
                                                        :no-input="true"
                                                        :fullscreen-mobile="true"
                                                        v-model="formData.move_date"
                                                        color="#3e983e" 
                                                    />
                                                    <has-error :form="formData" field="move_date"></has-error>
                                                </div>
                                                <div class="col-md-4" v-if="formData.is_short_term">
                                                    <label for="leave_date" class="label">Leave By</label>
                                                     <VueDatePicker 
                                                        placeholder="Pick Date"
                                                        button-validate="Ok"
                                                        button-cancel="Cancel"
                                                        :validate="true"
                                                        :no-input="true"
                                                        :fullscreen-mobile="true"
                                                        v-model="formData.leave_date"
                                                        color="#3e983e" 
                                                    />
                                                    <has-error :form="formData" field="leave_date"></has-error>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="minimum_stay">Minimum Stay</label>
                                                    <v-select
                                                        v-model="formData.minimum_stay"
                                                        :options="storeData.minimumStay.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="description mt-5">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="description" class="label">Description</label>
                                                <textarea name="description" 
                                                    class="form-control" 
                                                    id="description" 
                                                    rows="10" 
                                                    v-model="formData.description"
                                                ></textarea>
                                                <has-error :form="formData" field="description"></has-error>
                                            </div>
                                            <h2 class="form-title">Residence</h2>
                                          <div class="form-group row">
                                                <label for="building_type" class="col-sm-3 col-form-label">Building
                                                    Type</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.building_type"
                                                        :options="storeData.buildingType.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="move_in_fee" class="col-sm-3 col-form-label">Move In Fee</label>
                                                <div class="col-sm-9">
                                                    <input type="text" 
                                                        id="move_in_fee" 
                                                        class="form-control" 
                                                        name="move_in_fee" 
                                                        v-model="formData.move_in_fee"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="utility_cost" class="col-sm-3 col-form-label">Utility Cost</label>
                                                <div class="col-sm-9">
                                                    <input type="text" 
                                                    id="utility_cost" 
                                                    class="form-control" 
                                                    name="utility_cost" 
                                                    v-model="formData.utility_cost"
                                                >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="parking_rent" class="col-sm-3 col-form-label">Parking Rent</label>
                                                <div class="col-sm-9">
                                                    <input type="text" 
                                                    id="parking_rent" 
                                                    class="form-control" 
                                                    name="parking_rent" 
                                                    v-model="formData.parking_rent"
                                                >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Is Furnished?</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-control custom-radio mr-sm-2 custom-control-inline">
                                                        <input type="radio" 
                                                            name="is_furnished" 
                                                            class="custom-control-input" 
                                                            value="yes" id="furnished_yes" 
                                                            v-model="formData.is_furnished"
                                                        >
                                                        <label class="custom-control-label" for="furnished_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" 
                                                            name="is_furnished" 
                                                            class="custom-control-input" 
                                                            value="no" id="furnished_no" 
                                                            v-model="formData.is_furnished"
                                                        >
                                                        <label class="custom-control-label" for="furnished_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2 class="form-title">Amenities</h2>
                                            <div class="form-row">
                                                <div class="col-6" v-for="amenity in storeData.amenities" :key="amenity.name">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" 
                                                            class="custom-control-input" 
                                                            :id="amenity.name"
                                                            name="amenities[]" 
                                                            v-model="formData.amenities"
                                                            :value="amenity.name"
                                                        >
                                                        <label class="custom-control-label" :for="amenity.name">{{ amenity.name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="description-household">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
                                            <h2 class="form-title">Household</h2>
                                            <div class="form-group row age">
                                                <label for="customRange1" class="col-sm-3 col-form-label">Household
                                                    Age</label>
                                                <div class="col-sm-9">
                                                    <vue-slider 
                                                        v-model= "formData.household_age" 
                                                        :min= "18" 
                                                        :max= "99"
                                                        :tooltip= "'none'"
                                                        :enable-cross= "false"
                                                        :height= "5"
                                                        :dotSize= "16"
                                                    ></vue-slider>
                                                    <p>Min Age: {{ formData.household_age[0] }} and Max Age: {{ formData.household_age[1] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="people_in_household" class="col-sm-3 col-form-label">People in
                                                    Household</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        placeholder="People in household"
                                                        v-model="formData.people_in_household"
                                                        :options="storeData.peopleInHousehold.options"
                                                    >
                                                    </v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="household_sex" class="col-sm-3 col-form-label">Household
                                                    Sex</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.household_sex"
                                                        :options="storeData.householdSex.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <h2 class="form-title">Life Style</h2>
                                            <div class="form-group row">
                                                <label for="cleanliness" class="col-sm-3 col-form-label">Cleanliness</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.cleanliness"
                                                        :options="storeData.cleanliness.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="overnight_guest" class="col-sm-3 col-form-label">Overnight
                                                    Guast</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.overnight_guest"
                                                        :options="storeData.overnightGuests.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="party_habit" class="col-sm-3 col-form-label">Party
                                                    Habit</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.party_habit"
                                                        :options="storeData.partyHabits.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="get_up" class="col-sm-3 col-form-label">Get Up</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.get_up"
                                                        :options="storeData.getUp.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="go_to_bed" class="col-sm-3 col-form-label">Go to Bed</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.go_to_bed"
                                                        :options="storeData.goToBed.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="food_preference" class="col-sm-3 col-form-label">Food
                                                    Preference</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.food_preference"
                                                        :options="storeData.foodPreference.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="smoker" class="col-sm-3 col-form-label">Smoker</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.smoker"
                                                        :options="storeData.smoker.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="work_schedule" class="col-sm-3 col-form-label">Work
                                                    Schedule</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.work_schedule"
                                                        :options="storeData.workSchedule.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="occupation"
                                                    class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.occupation"
                                                        :options="storeData.occupation.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <h2 class="form-title">Room Mate Preference</h2>
                                            <div class="form-group row age">
                                                <label for="age" class="col-sm-3 col-form-label">Age</label>
                                                <div class="col-sm-9">
                                                    <vue-slider 
                                                        v-model= "formData.prefer_age" 
                                                        :min= "18" 
                                                        :max= "99"
                                                        :tooltip= "'none'"
                                                        :enable-cross= "false"
                                                        :height= "5"
                                                        :dotSize= "16"
                                                    ></vue-slider>
                                                    <p>Min Age: {{ formData.prefer_age[0] }} and Max Age: {{ formData.prefer_age[1] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="prefer_smoker" class="col-sm-3 col-form-label">Smoke
                                                    Preference</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.prefer_smoker"
                                                        :options="storeData.preferSmoker.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Students
                                                    Only</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-control custom-radio mr-sm-2 custom-control-inline">
                                                        <input type="radio" 
                                                            name="prefer_student" 
                                                            class="custom-control-input"
                                                            id="prefer_student_yes"
                                                            value="yes"
                                                            v-model="formData.prefer_student"
                                                        >
                                                        <label class="custom-control-label" for="prefer_student_yes">Yes</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" 
                                                            name="prefer_student" 
                                                            class="custom-control-input"
                                                            id="prefer_student_no"
                                                            value="no"
                                                            v-model="formData.prefer_student"
                                                        >
                                                        <label class="custom-control-label" for="prefer_student_no">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2 class="form-title">Pets Preference</h2>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <label class="label">Do You Have Pets?</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-control custom-checkbox" v-for="pet in storeData.pets" :key="'our_pet_' + pet.name">
                                                        <input type="checkbox" 
                                                            class="custom-control-input"
                                                            :id="'our_pets_' + pet.name"
                                                            name="our_pets[]"
                                                            v-model="formData.household_pets"
                                                            :value="pet.name"
                                                        >
                                                        <label class="custom-control-label" :for="'our_pets_' + pet.name">{{ pet.name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-5">
                                                <div class="col-md-4">
                                                    <label class="label">Pets Preference</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="custom-control custom-checkbox" v-for="pet in storeData.pets" :key="'prefer_pets_' + pet.name">
                                                        <input type="checkbox" 
                                                            class="custom-control-input"
                                                            :id="'prefer_pets_' + pet.name" 
                                                            name="prefer_pets[]"
                                                            v-model="formData.prefer_pets"
                                                            :value="pet.name"
                                                        >
                                                        <label class="custom-control-label" :for="'prefer_pets_' + pet.name">{{ pet.name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-12">
                                <div class="basic-form mt-5 text-center">
                                    <button class="btn btn-success w-md-25 mr-3 btn-lg" @click.prevent="formSubmitted">Continue</button>
                                    <button class="btn btn-dark w-md-25 btn-lg" @click.prevent="formCancelled">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    import { store } from '../store/store'

    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    import PlaceAutocomplete from './plugin/PlaceAutocomplete'

    import VueUploadMultipleImage from './plugin/ImageUploadComponent'

    export default {
        components: {
            VueSlider,
            PlaceAutocomplete,
            VueUploadMultipleImage
        },
        data() {
            return {
                formData: new Form({
                    title: '',
                    location: '',
                    lat: null,
                    lng: null,
            
                    rental_currency: 'USD',
                    monthly_rent: '',
                    is_short_term: false,
                    move_date: new Date().toJSON().slice(0,10),
                    leave_date: null,
                    minimum_stay: '',
                    description: '',

                    building_type: '',
                    move_in_fee: '',
                    utility_cost: '',
                    parking_rent: '',
                    is_furnished: 'no',

                    amenities: [],

                    household_age: [18, 99],
                    people_in_household: '',
                    household_sex: '',

                    cleanliness: '',
                    overnight_guest: '',
                    party_habit: '',
                    get_up: '',
                    go_to_bed: '',
                    food_preference: '',
                    smoker: '',
                    work_schedule: '',
                    occupation: '',

                    prefer_age: [18, 99],
                    prefer_smoker: '',
                    prefer_student: 'no',

                    household_pets: [],
                    prefer_pets: [],
                    images: []

                }),

                storeData: store
               
            }
        },
        methods: {
            formSubmitted(){
                this.formData.post('/offerrooms')
                    .then(({ data }) => { 
                        window.location.href = data.redirectUrl;
                    })
                
            },
            formCancelled(){
                window.location.href = '/listingNew';
            },
             placeSelected(place){
                this.formData.location = place.label;
                this.formData.lng = place.x;
                this.formData.lat = place.y;
            },
            cancelled(){
                this.formData.location = '';
                this.formData.lat = null;
                this.formData.lng = null;
            },
             // image upload and delete
            uploadImage(image){
                axios.post('/fileUpload', image)
                .then(response => {
                    this.formData.images.push(response.data);
                    this.showMessege('Image uploaded successfully', 'success');
                })
                .catch(error => {
                    if (error.response.status == 422){
                        let message = error.response.data.errors.image[0];
                        this.showMessege(message, 'error');
                    }
                })
            },
            deletedImage(file, index){
                axios.post('/fileDelete', {url: file})
                .then(response => {
                    if(response.data == 'done'){
                        this.formData.images.splice(index, 1);
                        this.showMessege('Image has been deletee!', 'success');
                    }
                });
            },
            showMessege(message, type){
                this.$dlg.toast(message, {
                    language: 'en',
                    position: 'topRight',
                    messageType: type,
                    closeTime: 30
                });
            }
        },
        mounted() {
            console.log(this.storeData);
        }
    }
</script>

<style scoped>

.help-block.invalid-feedback{
    display: block !important;
    font-weight: 700;
}
.age >>> .vue-slider-process {
    background-color: #21880e;
}
.age >>> .vue-slider-dot-tooltip-inner {
    border-color: #3e983e;
    background-color: #3e983e;
}
</style>
