<template>
    <div>
        <div class="confirm-email" v-if="showConfirm">
            <div class="form-group">
                <label for="email" class="label">Confirm Your email</label>
                <input type="email" id="email" v-model="email" class="form-control form-control-lg">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success" @click="sendConfirmCode">Confirm Email</button>
            </div>
        </div>
        <div class="confirm-email" v-else>
            <div class="form-group">
                <label for="email" class="label">Enter the Confirmation Code</label>
                <input type="email" id="email" class="form-control form-control-lg">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success">Verify</button>
            </div>
        </div>
       
    </div>
</template>

<script>
    export default {
        data(){
            return {
                email: '',
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
                    this.showConfirm = false;
                    this.$dlg.toast(`We have send you a email. Please, Check your email...`, {
                        messageType: 'success',
                        language: 'en',
                        position: 'topRight',
                        closeTime: true
                    });
                }
            }
        }
    }
</script>





