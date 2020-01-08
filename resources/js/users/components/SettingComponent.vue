<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2 class="setting-header text-center mb-5">Setting</h2>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Email</h4>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-2">{{ userEmail }}</p>
                            <a href="#" 
                                class="color-main-text" 
                                v-if="!showEmailForm"
                                @click.prevent="showEmailForm = true"
                            >Change Email</a>
                            <div class="email-block main-color-border radius-10 p-3" v-else>
                                <div class="form-group">
                                    <input type="email" v-model="email" class="form-control form-control-lg" placeholder="Enter a valid Email..." autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" @click.prevent="changeEmail">Chage Email</button>
                                    <button class="btn btn-warning" @click.prevent="cancelEmail">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Password</h4>
                        </div>
                        <div class="col-sm-9">
                            <a href="#" 
                                class="color-main-text"
                                v-if="!showPassForm"
                                @click.prevent="showPassForm = true"
                            >Change Password</a>
                            <div class="password-block main-color-border radius-10 p-3" v-else>
                                <div class="form-group">
                                    <input type="password" v-model="password.newPassword" class="form-control form-control-lg" placeholder="New Password" autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" @click.prevent="changePassword">Chage password</button>
                                    <button class="btn btn-warning" @click.prevent="showPassForm = false">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                                <h4 class="font-18 mb-2">Language</h4>
                        </div>
                        <div class="col-sm-9">
                            <select class="selectpicker show-tick" data-style="custom-picker">
                                <option selected>English</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Currency</h4>
                        </div>
                        <div class="col-sm-9">
                            <select class="selectpicker show-tick" data-style="custom-picker">
                                <option selected>USD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3" id="setting-notifications">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="font-18 mb-3">Notifications</h4>
                        </div>
                        <div class="col-md-9">
                            <p class="mb-2">Gettingroom notification settings allow you to control what notifications get delivered via email to {{ user.email }}</p>
                            <p class="py-2">New messages waiting in your mailbox 
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <p class="py-2">Helpdesk activity updates 
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <p class="py-2">Daily matches
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <p class="py-2">General account updates
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3" id="setting-account">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Status</h4>
                        </div>
                        <div class="col-sm-9">
                            <p>Active. Visible to Gettingroom users
                                <label class="custom-switch float-right">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </p>
                            <a href="#" class="color-main-text">Delete Account</a>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3" id="setting-subscriptions">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4 class="font-18 mb-2">Subscription</h4>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-3">You are a free user.</p>
                            <p class="mb-3">Upgrade and Unlock Gettingroom Mailbox <br> and Gettingroom Social Connect</p>
                            <a href="/upgrade/plans" class="btn btn-warning font-20">Upgrade Your Account</a>
                        </div>
                    </div>
                </div>
                <div class="setting-box py-3" id="setting-transctions">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-3 font-18">Transactions</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="color-main-text">
                                        <th>Date (Estern Time)</th>
                                        <th>Duration</th>
                                        <th>price</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                type: Object,
                required: true
            },
            userPass: {
                type: String,
                required: false,
            }
        },
        data(){
            return {
                userEmail: '',
                email: '',
                password: {
                    oldPassword: '',
                    newPassword: ''
                },
                showEmailForm: false,
                showPassForm: false,
                havePass: false
            }
        },
        methods: {
            changeEmail(){
                axios.post('/setting/email', {
                    email: this.email
                })
                .then(response => {
                    this.userEmail = response.data;
                    this.cancelEmail();
                    this.showAlert('Email has been chaged successfully!', 'success');
                })
                .catch(error => {
                    if (error.response.status == 422){
                        let message = error.response.data.errors.email[0];
                        this.showAlert(message, 'error');
                    }
                })
            },
            cancelEmail(){
                this.email = '';
                this.showEmailForm  = false;
            },
            changePassword(){
                axios.post('/setting/password', {
                    newPassword: this.password.newPassword
                })
                .then(response => {
                    this.cancelPassword();
                    this.showAlert('Password has been Changed', 'success');
                })
                .catch(error => {
                    if (error.response.status == 422){
                        let message = error.response.data.errors.newPassword[0];
                        this.showAlert(message, 'error');
                    }
                })
            },
             cancelPassword(){
                this.password.newPassword = '';
                this.showPassForm  = false;
            },
            showAlert(message, type) {
                this.$dlg.toast(message, {
                    messageType: type,
                    language: 'en',
                    position: 'topRight',
                    closeTime: true
                });
            }
        },
        mounted() {
           this.userEmail = this.user.email;
           this.havePass = this.userPass ? true : false;
        }
    }
</script>
