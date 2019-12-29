<template>
    <div id="verify-modal">
        <div class="card mb-3 bg-success shadow-lg">
            <div class="card-body verify-intro">
                <h2 class="text-center text-white font-22 mb-2 text-uppercase">Account Varification</h2>
                <p class="text-center text-white font-16 p-2">
GettingRoom takes member safety and security very seriously. We don’t even want people that aren’t easily identifiable from their Social profile. Every Profile goes through a security filter from a GettingRoom team member.</p>
            </div>
        </div>
        
        <p>Account Status: <span class="font-16 font-weight-bold" style="color: red">Unverified</span></p>
        <p class="text-dark font-16 mb-2">Complete the steps marked with * to verify your account and send a message:</p>
        <div class="mb-2 border p-2 verify-block" v-if="verified.email">
            <h2 class="text-dark font-16">Email is verified</h2>
            <span class="badge badge-success">Verified</span>
        </div>
        <div class="mb-2 border p-2 verify-block" v-else @click="openEmailVerifyModel">
            <h2 class="text-dark font-16">Confirm Your Email *</h2>
            <p>Account Verification is need to validate your Account</p>
        </div>
        <div class="mb-2 border p-2 verify-block" v-if="verified.phone">
            <h2 class="text-dark font-16">Phone is Verified</h2>
            <span class="badge badge-success">Verified</span>
        </div>
        <div class="mb-2 border p-2 verify-block" v-else @click="openPhoneVerifyModel">
            <h2 class="text-dark font-16">Verify Your Phone Number *</h2>
            <p>verifying your phone number helps prospective matches contact you faster</p>
        </div>
        <div class="mb-2 border p-2 verify-block" @click="activeTrial">
            <h2 class="text-dark font-16">Active Trial Package! It's Free! *</h2>
            <p>Trial package has fully premium featured and it's completely free for 24 hours! to enjoy the service</p>
        
        </div>
        <div class="mb-2 border p-2">
            <h2 class="text-dark font-16">Verify Your Social Media</h2>
            <div class="verify-social-icons mt-4 text-center">
                <a href="#" class="facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="comments"><i class="fab fa-google"></i></a>
                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
     
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
                    fb: false,
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
                    width: 400,
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
                    width: 400,
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
                        this.verified.fb = response.data.fb_verified;
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
            }
        },
        created(){
            this.getVerificationInfo();
        }
    }
</script>
<style scoped>
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
    font-size: 30px;
    display: inline-block;
    padding: 5px 13px;
    border-radius: 5px;
    margin: 0 5px;
}
</style>




