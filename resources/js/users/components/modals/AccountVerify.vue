<template>
    <div id="verify-modal">
        <div class="card mb-3 bg-success radius-10">
            <div class="card-body verify-intro">
                <h2 class="text-center text-white font-22 mb-2 text-uppercase">Account Varification</h2>
                <p class="text-center text-white font-16 p-2">
                    GettingRoom takes member safety and security very seriously. We don’t even want people that aren’t easily identifiable from their Social profile. Every Profile goes through a security filter from a GettingRoom team member.
                </p>
            </div>
        </div>
        
        <p v-if="verified.email && verified.phone && verified.subscribed">Account Status: <span class="font-16 font-weight-bold color-main-text">Verified</span></p>
        <p v-else>Account Status: <span class="font-16 font-weight-bold" style="color: red">Unverified</span></p>
        <p class="text-dark font-16 mb-2 verify-condition">Complete the steps marked with * to verify your account and send a message:</p>
        <div class="p-2 clearfix" v-if="verified.email">
            <span class="d-inline-block font-30 float-left color-main-text"><i class="fas fa-check-circle"></i></span>
            <div class="float-left ml-3">
                <h2 class="text-dark font-16">Email is verified</h2>
                <p>{{ email }}</p>
            </div>
        </div>
        <div class="mb-2 border radius-10 p-2 verify-block clearfix" v-else @click="openEmailVerifyModel">
            <span class="d-inline-block font-30 float-left color-verify span"><i class="far fa-circle"></i></span>
            <div class="float-left pl-3 content">
                <h2 class="text-dark font-16">Confirm Your Email <span class="text-danger font-20">*</span></h2>
                <p>Account Verification is need to validate your Account</p>
            </div>
            <span class="d-inline-block float-right font-weight-normal font-20 mt-2 color-verify span"><i class="fas fa-greater-than"></i></span>
        </div>
        <div class="p-2 clearfix" v-if="verified.phone">
            <span class="d-inline-block font-30 float-left color-main-text"><i class="fas fa-check-circle"></i></span>
            <div class="float-left ml-3">
                <h2 class="text-dark font-16">Phone is Verified</h2>
                <p>{{ phone }}</p>
            </div>
        </div>
        <div class="mb-2 border radius-10 p-2 verify-block clearfix" v-else @click="openPhoneVerifyModel">
            <span class="d-inline-block font-30 float-left color-verify span"><i class="far fa-circle"></i></span>
            <div class="float-left pl-3 content">
                <h2 class="text-dark font-16">Verify Your Phone Number <span class="text-danger font-20">*</span></h2>
                <p>verifying your phone number helps prospective matches contact you faster</p>
            </div>
            <span class="d-inline-block float-right font-weight-normal font-20 mt-2 color-verify span"><i class="fas fa-greater-than"></i></span>
        </div>
        <div class="p-2 clearfix" v-if="verified.subscribed">
            <span class="d-inline-block font-30 float-left color-main-text"><i class="fas fa-check-circle"></i></span>
            <div class="float-left ml-3">
                <h2 class="text-dark font-16">You are a premium User!!</h2>
            </div>
        </div>
        <div class="mb-2 border radius-10 p-2 verify-block clearfix" @click="activeTrial" v-else>
            <span class="d-inline-block font-30 float-left color-verify mt-2 span"><i class="far fa-circle"></i></span>
            <div class="float-left pl-3 content">
                <h2 class="text-dark font-16">Active Trial Package! It's Free! <span class="text-danger font-20">*</span></h2>
                <p>Trial package has fully premium featured and it's completely free <br> for 24 hours! to enjoy the service</p>
            </div>
            <span class="d-inline-block float-right font-weight-normal font-20 mt-3 color-verify span"><i class="fas fa-greater-than"></i></span>
        </div>
        <div class="mb-2 border radius-10 p-2">
            <h2 class="text-dark font-16">Verify Your Social Media</h2>
            <p>Get more badge for your account.</p>
            <div class="verify-social-icons mt-4 text-center">
                <a href="#" @click.prevent="popupVerification('/socialauth/facebook', 'facebook')" v-if="!verified.facebook">
                    <img src="/frontend/images/social-icon/png/verify/fb-false.png" alt="facebook">
                </a>
                <span class="d-inline-block social-verified" v-else>
                   <img src="/frontend/images/social-icon/png/verify/fb-false.png" alt="facebook">
                    <span class="d-inline-block font-20 color-main-text"><i class="fas fa-check-circle"></i></span>
                </span>
                <a href="#" v-if="!verified.twitter">
                    <img src="/frontend/images/social-icon/png/verify/twitter-false.png" alt="twitter">
                </a>
                <span class="d-inline-block social-verified" v-else>
                    <img src="/frontend/images/social-icon/png/verify/twitter-false.png" alt="twitter">
                    <span class="d-inline-block font-20 color-main-text"><i class="fas fa-check-circle"></i></span>
                </span>
                <!-- <a href="#" class="instagram"><i class="fab fa-instagram"></i></a> -->
                <a href="#" @click.prevent="popupVerification('/socialauth/google', 'google')" v-if="!verified.google">
                    <img src="/frontend/images/social-icon/png/verify/google-false.png" alt="google">
                </a>
                <span class="d-inline-block social-verified" v-else>
                    <img src="/frontend/images/social-icon/png/verify/google-false.png" alt="google">
                    <span class="d-inline-block font-20 color-main-text"><i class="fas fa-check-circle"></i></span>
                </span>
                <a href="#" v-if="!verified.linkedin" @click.prevent="popupVerification('/socialauth/linkedin', 'linkedin')">
                    <img src="/frontend/images/social-icon/png/verify/linkedin-false.png" alt="linkedin">
                </a>
                <span class="d-inline-block social-verified" v-else>
                    <img src="/frontend/images/social-icon/png/verify/linkedin-false.png" alt="linkedin">
                    <span class="d-inline-block font-20 color-main-text"><i class="fas fa-check-circle"></i></span>
                </span>
     
            </div>
        </div>
    </div>
</template>

<script>
    import EmailVerify from './EmailVerify'
    import PhoneVerify from './PhoneVerify'

    export default {
        data(){
            return {
                authUser: null,
                email: '',
                phone: '',
                verified: {
                    email: false,
                    phone: false,
                    subscribed: false,
                    facebook: false,
                    google: false,
                    linkedin: false,
                    twitter: false,
                    instagram: false
                }
            }
        },
        methods: {
            openEmailVerifyModel(){
                this.$dlg.modal(EmailVerify, {
                    width: 300,
                    height: 200,
                    title: '',
                    params: {
                        authUser: this.authUser,
                        email: this.email
                    },
                    callback: data => {
                        if(data.email == 1){
                            this.verified.email = 1;
                        }
                    }
                })
            },
            openPhoneVerifyModel(){
                this.$dlg.modal(PhoneVerify, {
                    width: 300,
                    height: 200,
                    title: '',
                    params: {
                        authUser: this.authUser,
                        phone: this.phone
                    },
                    callback: data => {
                        if(data.phone == 1){
                            this.verified.phone = 1;
                        }
                    }
                })
            },
            getVerificationInfo(){
                axios.get('/get-auth-user')
                    .then(response => {
                        this.authUser = response.data.id;
                        this.email = response.data.email;
                        this.phone = response.data.phone;
                        this.verified.email = response.data.email_verified;
                        this.verified.phone = response.data.phone_verified;
                        this.verified.subscribed = response.data.subscribed;
                        this.verified.fb = response.data.facebook_verified;
                        this.verified.google = response.data.google_verified;
                        this.verified.instagram = response.data.instagram_verified;
                        this.verified.linkedin = response.data.linkedin_verified;
                        this.verified.twitter = response.data.twitter_verified;
                        console.log(this.verified);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            activeTrial(){
                window.location.href = '/upgrade/plans';
            },
            popupVerification(url,title, w=300, h=500){
                let _self = this; 
                let newWindow = window.open(url, title, "width=300,height=400,toolbar=0,scrollbars=0,status=0,resizable=0,location=0,menuBar=0");
                if (window.focus) newWindow.focus();
                let tryingToClose = setInterval(function(){ 
                    if((newWindow.location.pathname == '/social/done') || (newWindow.location.pathname == '/social/error'))
                    {
                        clearInterval(tryingToClose);
                        newWindow.close();
                        _self.getVerificationInfo();
                    }
                 }, 100);


            }
        },
        created(){
            this.getVerificationInfo();
        }
    }
</script>
<style scoped>
.color-verify{
    color: #a5a8ab !important
}
.verify-intro p{
    line-height: 1.2;
}
.verify-block{
    cursor: pointer;
}
.verify-block:hover h2{
    color: green !important;
}
.verify-social-icons a{
    display: inline-block;
    padding: 5px 13px;
    margin: 0 5px;
}

.verify-social-icons  img{
    transition: .5s;
}
.verify-social-icons  img:hover{
    filter:drop-shadow(8px 8px 10px gray);
    transition: .5s;
}
.social-verified{
    position: relative;
    margin: 0 10px;
}
.social-verified > span{
    position: absolute;
    top: -10px;
    right: -7px;
}

/* media query*/

/* Extra small devices (phones, 576 and down) xs */
@media only screen and (max-width: 575.98px) {
    .verify-intro{
        padding: 10px 5px;
    }
    .verify-intro h2{
        font-size: 20px !important;
    }
    .verify-intro p{
        font-size: 15px !important;
    }
    .verify-block span.span{
        width: 8%;
        box-sizing: border-box;
        margin-top: 10px !important;
    }
    .verify-block span.span:last-child{
        margin-top: 18px !important;
    }
    .verify-block .content{
        width: 84%;
        box-sizing: border-box;
    }
    .verify-block .content h2{
        font-size: 15px !important;
    }
    .social-verified{
        margin: 0 5px;
    }
    .verify-social-icons img, .social-verified img{
        width: 30px;
    }
    .verify-social-icons a{
        padding: 5px;
    }
    .social-verified > span{
        font-size: 16px !important;
    }
    .verify-condition{
        font-size: 14px !important;
        line-height: 1.3;
    }
}

@media only screen and (min-width: 576px) and (max-width: 767.98px){

	
} 

</style>




