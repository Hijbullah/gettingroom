<template>
    <div class="content">
        <form  class="needs-validation" @submit.prevent="formSubmitted" @keydown="formData.onKeydown($event)">
             <div class="listing-img-upload" style="min-height: 300px;">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="description-household mt-5">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
                                            <h2 class="form-title">Residence</h2>
                                            <div class="form-group row">
                                                <label for="bedroom" class="col-sm-3 col-form-label">Bed Room</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.bedroom"
                                                        :options="storeData.bedroom.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="bathroom" class="col-sm-3 col-form-label">Bath Room</label>
                                                <div class="col-sm-9">
                                                    <v-select
                                                        v-model="formData.bathroom"
                                                        :options="storeData.bathroom.options"
                                                    ></v-select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="measurement">Measurement</label>
                                                    <input type="text" 
                                                        id="measurement" 
                                                        class="form-control" 
                                                        name="measurement" 
                                                        v-model="formData.measurement"
                                                    >
                                                    <has-error :form="formData" field="measurement"></has-error>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="measurement_unit" class="label">Unit</label>
                                                    <v-select 
                                                        :options="storeData.measurementUnit.options"
                                                        v-model="formData.measurement_unit"
                                                    ></v-select>
                                                    <has-error :form="formData" field="measurement_unit"></has-error>
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
                                                <div class="col-6" v-for="amenity in storeData.apartmentAmenities" :key="amenity.name">
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    import { store } from '../store/store'

    import PlaceAutocomplete from './plugin/PlaceAutocomplete'

    import VueUploadMultipleImage from './plugin/ImageUploadComponent'

    export default {
        components: {
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

                    bedroom: '',
                    bathroom: '',
                    measurement: '',
                    measurement_unit: '',
                    is_furnished: 'no',

                    amenities: [],
                    images: []

                }),

                storeData: store
               
            }
        },
        methods: {
            formSubmitted(){
                this.formData.post('/offerapartments')
                    .then(({ data }) => { 
                        window.location.href = data.redirectUrl;
                        console.log(data) 
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
