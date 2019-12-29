<template>
    <div>
        <div class="confirm-email" v-if="showConfirm">
            <div class="form-group">
                <label for="email" class="label">Confirm Your email</label>
                <input type="email" id="email" v-model="userEmail" class="form-control form-control-lg">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" @click="sendConfirmCode">Confirm Email</button>
            </div>
        </div>
        <div class="confirm-email" v-else>
            <div class="form-group">
                <label for="code" class="label">Enter the Confirmation Code</label>
                <input type="text" v-model="code" id="code" class="form-control form-control-lg">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" :disabled="!code.length" @click="verifyCode">Verify</button>
            </div>
        </div>
       
    </div>
</template>

<script>
    export default {
        props: ['authUser', 'email'],
        data(){
            return {
                code: '',
                showConfirm: true
            }
        },
        methods: {
            sendConfirmCode(){
                if(this.email.length == 0){
                    this.$dlg.toast(`Plese, Enter your email`, {
                        messageType: 'error',
                        language: 'en',
                        position: 'topRight',
                        closeTime: true
                    });
                }else{
                    axios.get(`/verification/code/${this.authUser}/email`)
                    .then(response => {
                        if(response.data == 'done'){
                            this.showConfirm = false;
                            this.showAlert('We have send you a email with verification code. Please, Check your email...', 'success');
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                }
            },
            verifyCode(){
                axios.get(`/verification/verify/${this.code}/email`)
                    .then(response => {
                        if(response.data == 'done'){
                            this.showAlert('Email Verified!', 'success');
                            this.$emit('close', { email: 1 });
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
        computed: {
            userEmail(){
                return this.email;
            }
        }
    }
</script>





