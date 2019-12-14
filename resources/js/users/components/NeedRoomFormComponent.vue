<template>
    <div class="content">
        <form  class="needs-validation" @submit.prevent="formSubmitted" @keydown="formData.onKeydown($event)">
            <div class="listing-form-area py-5">
                <div class="container">
                    <div class="form-basic-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="basic-form mb-4">
                                    <button class="btn btn-success w-md-25 mr-3 btn-lg" @click.prevent="formSubmitted">Continue</button>
                                    <button class="btn btn-dark w-md-25 btn-lg" @click.prevent="formCancelled">Cancel</button>
                                </div>

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
                                                <!-- <places placeholder="Your Address" 
                                                    @change="handlePlaces"
                                                    :options="{  }"
                                                    name="location"
                                                >
                                                </places> -->
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
                                                <div class="col-md-6">
                                                    <label for="move_date" class="label">Move Date</label>
                                                    <VueDatePicker 
                                                        placeholder="Pick Date"
                                                        button-validate="Ok"
                                                        button-cancel="Cancel"
                                                        :validate="true"
                                                        :no-input="true"
                                                        :fullscreen-mobile="true"
                                                        v-model="formData.move_date" 
                                                    />
                                                    <has-error :form="formData" field="move_date"></has-error>
                                                </div>
                                                <div class="col-md-6" v-if="formData.is_short_term">
                                                    <label for="leave_date" class="label">Leave By</label>
                                                     <VueDatePicker 
                                                        placeholder="Pick Date"
                                                        button-validate="Ok"
                                                        button-cancel="Cancel"
                                                        :validate="true"
                                                        :no-input="true"
                                                        :fullscreen-mobile="true"
                                                        v-model="formData.leave_date" 
                                                    />
                                                    <has-error :form="formData" field="leave_date"></has-error>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="description-household mt-5">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
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
                                             <div class="form-group row">
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
                                        </div>
                                    </div>
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
    // import Places from 'vue-places'
   import PlaceAutocomplete from './plugin/PlaceAutocomplete'

    export default {
        components: {
            VueSlider,
            PlaceAutocomplete,
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
                    description: '',

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

                    my_pet: [],
                    prefer_pet: [],

                }),

                storeData: store
               
            }
        },
        methods: {
            formSubmitted(){
                this.formData.post('/needrooms')
                    .then(({ data }) => { 
                        window.location.href = data.redirectUrl;
                        console.log(data) 
                    })
                
            },
            formCancelled(){
                window.location.href = '/listingNew';
                // alert('cancelled');
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
        },
        computed: {
            
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

</style>
