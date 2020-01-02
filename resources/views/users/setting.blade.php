@extends('users.master')

@section('main-content')
<section class="setting p-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h2 class="setting-header text-center mb-5">Setting</h2>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="font-18">Email</h4>
                        </div>
                        <div class="col-9">
                            <p class="mb-2">{{ Auth::user()->email }}</p>
                            <a href="#" class="color-main-text">Change Email</a>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="font-18">Password</h4>
                        </div>
                        <div class="col-9">
                            <a href="#" class="color-main-text">Change Password</a>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-3">
                                <h4 class="font-18">Language</h4>
                        </div>
                        <div class="col-9">
                            <select class="selectpicker show-tick" data-style="custom-picker">
                                <option selected>English</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="setting-box border-bottom py-3">
                    <div class="row">
                        <div class="col-3">
                            <h4 class="font-18">Currency</h4>
                        </div>
                        <div class="col-9">
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
                            <p class="mb-2">Gettingroom notification settings allow you to control what notifications get delivered via email to {{ Auth::user()->email }}</p>
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
                        <div class="col-3">
                            <h4 class="font-18">Status</h4>
                        </div>
                        <div class="col-9">
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
                        <div class="col-3">
                            <h4 class="font-18">Subscription</h4>
                        </div>
                        <div class="col-9">
                            <p class="mb-3">You are a free user.</p>
                            <p class="mb-3">Upgrade and Unlock Gettingroom Mailbox <br> and Gettingroom Social Connect</p>
                            <a href="{{ url('/upgrade/plans') }}" class="btn btn-warning font-20">Upgrade Your Account</a>
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
</section>
@endsection


