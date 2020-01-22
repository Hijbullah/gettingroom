<template>
<div class="upload-form">
    <div class="uploader-drag"
            v-show="!images.length"
        >
        <div class="row no-gutters">
            <div class="col">
                <div class="upload-main-control">
                    <i class="fa fa-cloud-upload"></i>
                    <p class="mb-2">Upload your images here</p>
                    <div class="file-input">
                        <label for="file">Select a file</label>
                        <input type="file" id="file" @change="onInputChange">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="images-preview" v-show="images.length">
        <div class="row no-gutters">
            <div class="col-12 col-md-3">
                <div class="upload-control" v-show="images.length">
                    <label for="file" class="d-none d-md-block"><span>+</span></label>
                    <label for="file" class="d-md-none"><span>Add more images</span></label>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="img-wrapper">
                    <swiper :options="swiperOption">
                        <swiper-slide v-for="(image, index) in images" :key="index">
                            <img :src="'/storage/' + image" :class="{ 'drono': index === 0 }" :alt="`Image Uplaoder ${index}`">
                            <div class="remove" @click="removeImage(index)">
                                <span class="fa fa-trash text-danger"></span>
                            </div>
                        </swiper-slide>
                        <div class="swiper-button-prev" slot="button-prev"></div>
                        <div class="swiper-button-next" slot="button-next"></div>
                    </swiper>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import 'swiper/dist/css/swiper.css'
import { swiper, swiperSlide } from 'vue-awesome-swiper'

export default{
    name: 'imageUpload',
    components: {
        swiper,
        swiperSlide
    },
    props: ['images'],
    data(){
        return{
            swiperOption: {
                slidesPerView: 3,
                autoPlay: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                    breakpoints: {
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 10
                    },
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
        onInputChange(event){
            let selectedFile = event.target.files[0];
            this.uploadFile(selectedFile);
        },
        removeImage(index){
            let file = this.images[index];
            this.$emit('imageDelete', file, index);
        },
        uploadFile(file) {
            const formData = new FormData()
            formData.append('image', file, file.name);
            this.$emit('imageUpload', formData);
        }
    }
}
</script>

<style lang="scss" scoped>
    .upload-form{
        height: 300px;
    }
    .uploader-drag {
        width: 100%;
        height: 100%;
        color: #000;
        text-align: center;
        border-radius: 10px;
        font-size: 20px;

        i {
            font-size: 85px;
        }

        .file-input {
            width: 200px;
            margin: auto;
            height: 68px;
            position: relative;

            label,
            input {
                background: rgb(5, 139, 27);
                color: #fff;
                width: 100%;
                position: absolute;
                left: 0;
                top: 0;
                padding: 10px;
                border-radius: 4px;
                margin-top: 7px;
                cursor: pointer;
            }

            input {
                opacity: 0;
                z-index: -2;
            }
        }
    }
    .images-preview {
        height: 300px;
        .img-wrapper {
            width: 100%;
            height: 300px;
        }
        .upload-control {
            width: 100%;
            height: 300px;

            label {
                position: relative;
                width: 100%;
                height: 100%;
                cursor: pointer;
                background: rgb(5, 139, 27);
                display:block;
                
                span{
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 100px;
                    display: inline-block;
                    color: #fff;
                }
            }
        }
    }
</style>
<style scoped>
.upload-main-control{
    margin-top: 30px;
}
.swiper-container {
    width: 100%;
    height:100%;
}
.swiper-slide {
    height:100%;
    position: relative;
}
.swiper-slide img {
    width: 100%;
    height:100%;
}
.swiper-slide .remove{
    color: red;
    display: inline-block;
    position: absolute;
    right: 15px;
    top: 12px;
    font-size: 25px;
    cursor: pointer;
}

 /* Extra small devices (phones, 576 and down) xs */
@media only screen and (max-width: 575.98px) {
    .images-preview .upload-control {
        width: 100%;
        height: 40px;
        border-radius: 15px;
        margin-bottom: 3px; 
    }
    .images-preview .upload-control label span{
        font-size: 16px;
        font-weight: 700;
    }
}
/* Small devices (portrait tablets and large phones, 600px and up) sm */
@media only screen and (min-width: 576px) and (max-width: 767.98px){
 .images-preview .upload-control {
        width: 100%;
        height: 40px;
        border-radius: 15px;
        margin-bottom: 3px; 
    }
    .images-preview .upload-control label span{
        font-size: 16px;
        font-weight: 700;
    }
} 
</style>