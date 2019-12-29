<template>
    <div>
        <div class="confirm-phone" v-if="showConfirm">
            <div class="form-group">
                <label class="label">Confirm Your email</label>
                <vue-tel-input v-model="userPhone" @validate="validadte"></vue-tel-input>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" :disabled="disabled" @click="sendConfirmCode">Send Code</button>
            </div>
        </div>
        <div class="confirm-phone" v-else>
            <div class="form-group">
                <label for="code" class="label">Enter the Confirmation Code</label>
                <input type="text" v-model="code" id="code" class="form-control form-control-lg">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" @click="verifyCode">Verify</button>
            </div>
        </div>
       
    </div>
</template>

<script>
    import { VueTelInput } from 'vue-tel-input'

    export default {
        components: {
            VueTelInput,
        },
        props: ['authUser', 'phone'],
        data(){
            return {
                userPhone: '',
                code: '',
                showConfirm: true,
                disabled: true
            }
        },
        methods: {
            validadte({ number, isValid, country }){
                if(isValid){
                    this.userPhone = number.international;
                    this.disabled = false;
                }else{
                    this.disabled = true;
                }
            },
            sendConfirmCode(){
                axios.get(`/verification/code/${this.authUser}/phone/${this.userPhone}`)
                .then(response => {
                    if(response.data == 'done'){
                        this.showConfirm = false;
                        this.showAlert('We have send you a sms with verification code. Please, Check your Inbox...', 'success');
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
                
            },
            verifyCode(){
                axios.get(`/verification/verify/${this.code}/phone`)
                    .then(response => {
                        if(response.data == 'done'){
                            this.showAlert('Phone Verified!', 'success');
                            this.$emit('close', { phone: 1 });
                        }else{
                            this.showAlert('Code not matched! Please, try again!', 'error');
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            showAlert(msg, type) {
                this.$dlg.toast(msg, {
                    messageType: type,
                    language: 'en',
                    position: 'topRight',
                    closeTime: true
                });
            }
        },
        created(){
            this.userPhone = this.phone
        }
    }
</script>





