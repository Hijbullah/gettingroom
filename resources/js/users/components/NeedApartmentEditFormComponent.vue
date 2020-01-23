<template>
    <div class="content">
        <form  class="needs-validation" @submit.prevent="formSubmitted" @keydown="formData.onKeydown($event)">
            <div class="listing-form-area py-5">
                <div class="container-fluid">
                    <div class="form-basic-info">
                        <div class="row">
                            <div class="col-12">
                                <div class="basic-form mb-4">
                                    <button class="btn btn-success w-md-25 mr-3 btn-lg" @click.prevent="formSubmitted">Update</button>
                                    <button class="btn btn-dark w-md-25 btn-lg" @click.prevent="formCancelled">Cancel</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="basic-form">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title" class="label font-20 font-weight-bold text-muted">Headline</label>
                                                <input id="title" 
                                                    name="title" 
                                                    type="text" 
                                                    class="form-control form-control-lg" 
                                                    v-model="formData.title"
                                                    placeholder="Headline"
                                                >
                                                <has-error :form="formData" field="title"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <label class="label font-20 font-weight-bold text-muted" for="location">Location</label>
                                                <PlaceAutocomplete 
                                                    id="place-need"
                                                    classname="form-control form-control-lg font-16"
                                                    placeholder="Example: 'Chicago, IL'"
                                                    v-on:placechanged="getAddressData"
                                                    :value="formData.location"
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
                                                        placeholder="Select"
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
                                                        color="#3e983e"  
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
                                                        color="#3e983e"  
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
                                            <h2 class="form-title">Description</h2>
                                            <div class="form-group">
                                                 <p
                                                    class="form-text color-main-text mb-3"
                                                >Try to have at least 20 words. Our most successful listings are more than 160 words long.</p>
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
                                <div class="description-household">
                                    <div class="card shadow-none border-0 rounded-0 p-md-4">
                                        <div class="card-body">
                                            <h2 class="form-title">Apartment Types</h2>
                                            <div class="form-row">
                                                <div class="col-6" v-for="apartment in storeData.apartmentTypes" :key="apartment.name">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" 
                                                            class="custom-control-input" 
                                                            :id="apartment.name"
                                                            name="apartment_type[]" 
                                                            v-model="formData.apartment_type"
                                                            :value="apartment.name"
                                                        >
                                                        <label class="custom-control-label" :for="apartment.name">{{ apartment.name }}</label>
                                                    </div>
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
                            <div class="col-12">
                                <div class="basic-form mb-4">
                                    <button class="btn btn-success w-md-25 mr-3 btn-lg" @click.prevent="formSubmitted">Update</button>
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
    import PlaceAutocomplete from './plugin/GooglePlaceAutocomplete'

    export default {
        props: ['listing'],
        components: {
            PlaceAutocomplete
        },
        data() {
            return {
                formData: new Form({
                    listing_id: null,
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

                    apartment_type: [],
                    is_furnished: 'no',

                    amenities: []

                }),

                storeData: store
               
            }
        },
        methods: {
            formSubmitted(){
                this.formData.put(`/needapartments/${this.formData.listing_id}`)
                    .then(({ data }) => { 
                        window.location.href = data.redirectUrl; 
                    })
                
            },
            formCancelled(){
                window.location.href = `/listings/${this.formData.listing_id}`;
            },
            getAddressData(addressData){
                this.formData.location = addressData.adress;
                this.formData.lng = addressData.longitude;
                this.formData.lat = addressData.latitude;
            },
            setFormData(listing){
                this.formData.listing_id = listing.listing_id;
                this.formData.title = listing.title;
                this.formData.location = listing.location;
                this.formData.lat = listing.lat;
                this.formData.lng = listing.lng;
        
                this.formData.rental_currency =  listing.rental_currency;
                this.formData.monthly_rent =  Number(listing.monthly_rent);
                this.formData.is_short_term =  listing.is_short_term;
                this.formData.move_date =  listing.move_date;
                this.formData.leave_date =  listing.leave_date;
                this.formData.description =  listing.description;


                this.formData.apartment_type = listing.apartment_type ? listing.apartment_type.split(',') : [];
                this.formData.is_furnished = listing.is_furnished;
                this.formData.amenities = listing.amenities ? listing.amenities.split(',') : [];
            }
        },
        created() {
            this.setFormData(JSON.parse(this.listing));
        }
    }
</script>

<style scoped>

.help-block.invalid-feedback{
    display: block !important;
    font-weight: 700;
}

</style>
