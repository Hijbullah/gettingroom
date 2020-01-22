<template>
        <div class="form-content">
            <label class="sr-only" for="inlineFormInputGroup">Enter an address, neighborhood, city or
                ZIP code</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                </div>
                <input type="text" class="form-control form-control-sm"
                    placeholder="Example: 'Chicago, IL'"
                    v-model="value"  
                    @keyup.prevent="handlePlace"  
                >
            </div>
            <span class="font-20 text-danger cancelBtn" @click="cancelSearch" v-if="value.length >= 1 "><i class="fas fa-times"></i></span>
            <div class="result-content" v-if="showResult">
                <ul class="list-group">
                    <li class="list-group-item" 
                        v-for="(result, index) in results" 
                        :key="index"
                        @click="selectPlace(result)"
                    >{{ result.label }}</li>
                </ul>
            
            </div>
        </div>
    
</template>

<script>

    import { OpenStreetMapProvider } from 'leaflet-geosearch';
    const provider = new OpenStreetMapProvider();

    export default {
        name: 'place-autocomplete',
        props: {
            location: {
                type: String,
                default: ''
            },
        },
        data(){
            return {
                value: '',
                results: [],
                showResult: false,

            }
        },
        methods: {
            handlePlace(){
                if(this.value.length >= 3){
                    provider
                    .search({ query: this.value })
                    .then(result => { 
                        this.results = result;
                        this.showResult = true;
                    })
                }else{
                    this.results = [];
                    this.showResult = false;
                }
            },
            selectPlace(place){
                this.results = [];
                this.value = place.label;
                this.showResult = false;
                this.$emit('selected', place);
            },
            cancelSearch(){
                this.showResult = false;
                this.results = [];
                this.value = '';
                this.$emit('clear');
            }
        },
        mounted() {
            this.value = this.location;

        }
    }
</script>

<style scoped>
    .form-content{
        width: 100%;
        position: relative;
    }
    .form-content span.cancelBtn{
        display: inline-block;
        position: absolute;
        right: 10px;
        top: 10px;
        cursor: pointer;
        z-index: 212;
    }

    .form-content input {
        background-color: #fff;
        border: 1px solid #ddd;
        border-left: none;
        border-radius: 0;
        padding: 20px 40px 20px 10px;
        font-size: 16px;
        font-weight: 400;
    }
    .form-content .input-group-text {
        font-size: 1.5rem;
        color: #3e983e;
        border: 1px solid #ddd;
        border-right: none;
        border-radius: 0;
	    background-color: #fff;
    }
    .result-content{
        width: 100%;
        position: absolute;
        top: 55px;
        left: 0;
        z-index: 1010;
        height: 180px;
        overflow-y: auto;
    }
    .result-content li.list-group-item{
        cursor: pointer;
    }
</style>