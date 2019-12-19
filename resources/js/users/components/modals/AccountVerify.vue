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
        <div class="mb-2 border p-2 verify-block" @click="openEmailVerifyModel">
            <h2 class="text-dark font-16">Confirm Your Email *</h2>
            <p>Account Verification is need to validate your Account</p>
        </div>
        <div class="mb-2 border p-2 verify-block">
            <h2 class="text-dark font-16">Verify Your Phone Number *</h2>
            <p>verifying your phone number helps prospective matches contact you faster</p>
         
        </div>
        <div class="mb-2 border p-2 verify-block">
            <h2 class="text-dark font-16">Active Trial Package! It's Free! *</h2>
            <p>Trial package has fully premium featured and it's completely free for 24 hours! to enjoy the service</p>
        
        </div>
        <div class="mb-2 border p-2">
            <h2 class="text-dark font-16">Verify Your Social Media</h2>
            
        </div>
    </div>
</template>

<script>
    import EmailVerify from './EmailVerify'

    export default {
        data(){
            return {

            }
        },
        methods: {
            openEmailVerifyModel(){
                this.$dlg.modal(EmailVerify, {
                    width: 400,
                    height: 200,
                    title: '',
                    params: {
                    
                    },
                    callback: data => {
                        
                    }
                })
            },
            getVerification(){
                axios.get('/user?ID=12345')
                    .then(function (response) {
                        // handle success
                        console.log(response);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            }
        },
        created(){

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
</style>




