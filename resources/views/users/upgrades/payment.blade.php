@extends('users.master')

@section('main-content')
<!-- content area start-->
<section class="choose-package p-2 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">
                <h1 class="p-3 mb-3 font-weight-normal text-center">Payment</h1>
                <div class="text-center mb-5">
                    <span class="d-inline-block active py-2 px-3 font-18 mr-2 radius-10"><i class="fas fa-check"></i></span>
                    <span class="d-inline-block py-2 px-3 main-color-border font-18 radius-10">2</span>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="color-main-bg radius-10 font-20  text-white text-center pt-5"
                            style="min-height: 380px">
                            <h2 class="display-4">{{ $plan['nickname'] }}</h2>
                            <p class="text-center d-inline-block text-white mt-5 mb-4">
                                <span class=" align-top font-20 font-weight-bold">$</span>
                                <span class="font-30">{{ $plan['amount'] / 100 }}</span>
                                <span class=" align-top font-20 font-weight-bold">{{ $plan['currency'] }}</span>
                            </p>
                            <span class="border border-white p-2 btn-block w-50 m-auto mt-3 rounded">Selected</span>
                        </div>
                        <p class="mt-3 font-18 color-main-text">* You can cancel your subscription at any time</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="payment-form">
                                    <form method="#" action="#">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label font-18">Billing
                                                Contact</label>
                                            <div class="col-md-4 mb-3 mb-md-0">
                                                <input type="text" id="first_name" class="form-control form-control-lg" 
                                                    placeholder="First Name">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" id="last_name" class="form-control form-control-lg" 
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-md-3 col-form-label font-18">Billing
                                                Address</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" id="address" class="form-control form-control-lg" 
                                                        placeholder="Address">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 mb-3 mb-md-0">
                                                        <input type="text" id="country" class="form-control form-control-lg" placeholder="Country">
                                            
                                                    </div>
                                                    <div class="col-md-6 mb-3 mb-md-0">
                                                        <input type="text" id="state" class="form-control form-control-lg" placeholder="State">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6  mb-3 mb-md-0">
                                                        <input type="text" id="city" class="form-control form-control-lg"
                                                            placeholder="City">
                                                    </div>
                                                    <div class="col-md-6  mb-3 mb-md-0">
                                                        <input type="text" id="zip_code" class="form-control form-control-lg"
                                                            placeholder="Zip code">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="uname" class="col-md-3 col-form-label font-18">Payment</label>
                                            <div class="col-md-6  mb-3 mb-md-0">
                                                <div id="card-number-element" class="field"></div>   
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div> 
                                            </div>
                                            <div class="col-sm-6 col-md-2 col-11 ">
                                                <div id="card-cvc-element" class="field"></div>    
                                            </div>
                                            <span class="font-25 d-inline-block mt-1 text-secondary"><i
                                                    class="far fa-question-circle"></i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label font-18">Expires</label>
                                            <div class="col-sm-6 col-md-5 col-12  mb-3 mb-md-0">
                                                <div id="card-expiry-element" class="field"></div>    
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-12 mt-2">
                                                <img src="{{ asset('frontend/images/cards.png') }}" alt="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-privacy my-5">
                            <div class="text-area">
                                <div class="date text-right p-2 font-16">
                                    <p>Effective Date: May 14, 2018</p>
                                </div>
                                <h2 class="display-4 text-center font-weight-bold p-2">Roomster Corp. Terms of Us</h2>
                                <p class="font-16 p-2">These Roomster Terms of Use apply when you access, use or visit
                                    the Roomster website located at www.roomster.com (the “Site”), the associated mobile
                                    application, and the services provided through the Site and mobile application that
                                    provide apartment renters, seekers, roommates, and room renters an opportunity to
                                    connect with each other (the Site, the mobile application and these services
                                    constituting the "Service"). The Service is provided to you by Roomster Corp.
                                    (referred to in these Terms of Use as “Roomster” “we,” “us” and “our”). You must
                                    agree to these Terms of Use in order to use the Service. If you do not agree with
                                    these Terms of Use at any time, please cease use of the Service.</p>
                                <p class="font-16 p-2">
                                    Notice Regarding Dispute Resolution: These Terms of Use contain provisions that
                                    govern how claims you and we may have against each other are resolved (see Section
                                    14 below), including an agreement and obligation to arbitrate disputes, which will,
                                    subject to limited exceptions, require you to submit claims you have against us to
                                    binding arbitration, unless you opt-out in accordance with Section 14(E). Unless you
                                    opt-out of arbitration: (a) you will only be permitted to pursue claims against us
                                    on an individual basis, not as part of any class or representative action or
                                    proceeding and (b) you will only be permitted to seek relief (including monetary,
                                    injunctive, and declaratory relief) on an individual basis.
                                </p>
                                <p class="font-16 p-2">
                                    Updates to these Terms of Use. We may modify these Terms of Use from time to time.
                                    We will notify you of material changes to these Terms of Use by posting the amended
                                    terms on the Service at least thirty (30) days before the effective date of the
                                    changes. If you do not agree with the proposed changes, you should discontinue your
                                    use of the Service prior to the time the new Terms of Use take effect. If you
                                    continue using the Service after the new terms take effect, you will be bound by the
                                    modified Terms of Use.
                                    Privacy Policy. In connection with your use of the Service, please review our
                                    Privacy Policy, located at https://www.roomster.com/privacy, to understand how we
                                    use information we collect from you when you access, visit or use the Service. The
                                    Privacy Policy is part of and is governed by these Terms of Use and by agreeing to
                                    these Terms of Use, you agree to be bound by the terms of the Privacy Policy and
                                    agree that we may use information collected from you in accordance with its terms.
                                    Member Accounts and Registration.
                                </p>
                                <p class="font-16 p-2">
                                    Member Registration. You can visit and browse the Service without becoming a
                                    registered member of the Service, but you will not be able to post listings on the
                                    Service, respond to listings on the Service, access interactive portions of the
                                    Service or otherwise post Contributions (as defined in Section 6(A) below) unless
                                    you are a registered member of the Service. You can become a registered member of
                                    the Service by logging in to the Service through Facebook Connect. You therefore
                                    must have a valid and active account with Facebook in order to become a registered
                                    member of the Service. By logging in to the Service through Facebook Connect, you
                                    grant us permission to access and use the information that Facebook shares with us
                                    when you register to use the Service through Facebook Connect, in accordance with
                                    the privacy policy of Facebook and the privacy settings that are applicable to your
                                    Facebook account. For more details on how you can manage the information provided to
                                    us by Facebook, please review the privacy settings applicable to your Facebook
                                    account. We reserve the right to reject your member registration if, based on
                                    information provided to us through Facebook, we determine that your Facebook account
                                    is invalid, inactive, or is not associated with an individual person. If we reject
                                    your member registration, and you believe we have rejected your member registration
                                    in error, you may contact us at help@roomster.com.
                                </p>
                                <p class="font-16 p-2">
                                    Member Accounts. If you sign up to become a registered member of the Service, you
                                    agree: (a) to provide true, accurate, current and complete information about
                                    yourself as prompted by the Service’s registration form (the “Registration Data”);
                                    (b) to maintain and promptly update the Registration Data to keep it true, accurate,
                                    current and complete; and (c) that you will comply with the rules governing
                                    Contributions in Section 6(A) below. We reserve the right to refuse registration of,
                                    or to cancel, a member account in our reasonable discretion in accordance with
                                    applicable law. You will be responsible for maintaining the confidentiality of your
                                    member account. Roomster shall not be liable for any loss that you incur as a result
                                    of someone else using your member account, either with or without your knowledge.
                                    You may be held liable for any losses incurred by Roomster due to any unauthorized
                                    use of your member account.
                                    Member Obligations
                                </p>
                                <p class="font-16 p-2"> Representations and Warranties. When you use the Service, you
                                    represent that: (i) the information you submit is truthful and accurate; (ii) your
                                    use of the Service and your use of services available on the Service do not violate
                                    any applicable law or regulation; (iii) you are at least eighteen (18) years of age
                                    and otherwise have legal capacity to legally enter into these Terms of Use, and (iv)
                                    if you are listing a room, house, apartment, or condominium (each room, house,
                                    apartment or condominium constituting an “Accommodation”) through the Service: (x)
                                    you own and/or have all necessary rights and authority to offer for rent and to rent
                                    each Accommodation that you offer through the Service; and (y) you will accurately
                                    describe the subject Accommodation, will not fail to disclose a material defect in,
                                    or material information about, the Accommodation and will ensure that the
                                    description of the Accommodation is accurate and not misleading.</p>
                                <p class="font-16 p-2">Compliance with Laws. You agree that you are solely responsible
                                    for and agree to abide by all laws, rules and regulations applicable to the listings
                                    that you post through the Service, including but not limited to any and all laws,
                                    rules, regulations or other requirements relating to taxes, permits or license
                                    requirements, zoning ordinances, safety compliance and compliance with all
                                    anti-discrimination and fair housing laws, as applicable. You will be solely
                                    responsible for the collection, withholding or payment of any occupancy or other
                                    taxes that may be applicable to the Accommodation you list on the Service or use of
                                    the Service.
                                    Verification of Authority. If you are a tenant who is listing an Accommodation
                                    through the Service, please refer to your rental contract or lease, or contact your
                                    landlord, prior to listing the Accommodation to determine whether your rental
                                    contract or lease contains restrictions that would limit your ability to list the
                                    Accommodation. Listing your Accommodation may be a violation of your rental contract
                                    or lease, and could result in legal action against you by your landlord, including
                                    possible eviction.
                                    Insurance. We do not provide liability insurance to members in connection with the
                                    Service. Members are solely responsible for obtaining insurance coverage sufficient
                                    to protect their Accommodations. Members agree that they have or will obtain the
                                    appropriate insurance coverage sufficient to cover the rental of the Accommodations
                                    they list on the Service.</p>
                                <p> Risks Relating to the Service; Disclaimer. MEMBERS OF THE SERVICE, AND NOT ROOMSTER,
                                    ARE SOLELY RESPONSIBLE FOR ACCOMMODATIONS LISTED ON THE SERVICE. WE HAVE NO CONTROL
                                    OVER THE QUALITY, SAFETY, OR LEGALITY OF ANY ACCOMMODATION LISTED ON THE SERVICE,
                                    THE TRUTH OR ACCURACY OF A LISTING, THE ABILITY OF THE MEMBER TO OFFER THE LISTED
                                    ACCOMMODATION, OR THE ABILITY OF OTHER MEMBERS TO PAY FOR ANY TRANSACTION. WE CANNOT
                                    ENSURE THAT ANY LISTING IS ACCURATE OR THAT ANY MEMBER WILL HONOR THE TERMS OF A
                                    LISTING OR ACTUALLY COMPLETE A TRANSACTION, AND WE DO NOT MAKE ANY REPRESENTATIONS
                                    AS TO THE QUALITY, LOCATION, AVAILABILITY, SUITABILITY, OR PRICING OF ANY SPECIFIC
                                    ACCOMMODATION LISTED ON THE SERVICE. WE ARE ALSO NOT RESPONSIBLE FOR ANY DAMAGE TO
                                    REAL PROPERTY, OR DAMAGE OR LOSS OF PERSONAL PROPERTY OR PERSONAL INJURY RESULTING
                                    IN CONNECTION WITH ANY TRANSACTION ENTERED INTO THROUGH USE OF THE SERVICE.
                                    Subscription Fees and Automatic Renewals</p>
                                <p class="font-16 p-2">Basic Membership. Becoming a member of the Service and creating a
                                    profile on the Service is free. This membership level constitutes “Basic
                                    Membership”. Basic Membership allows you to search, post and contact other members
                                    of the Service for free. Basic Membership provides you with access to potential
                                    roommates in each country where the Service is made available. With the Basic
                                    Membership, you can: bookmark members you like, receive daily matches via email, get
                                    matched with other members with our keyword and personality matching services, and
                                    send emails to other members of the Service to better introduce yourself.
                                    Full Membership. You will also have the ability to upgrade your Basic Membership by
                                    subscribing to a “Full Membership”. If you sign up for a Full Membership
                                    subscription you will have access to all of the functionality provided as part of
                                    the Basic Membership plus access to a private mailbox on the Service, access to
                                    social connections which link directly to social network profiles added by other
                                    users of the Service, such as Facebook, LinkedIn, Twitter and Instagram, and access
                                    to the text/SMS or call options that will enable you to contact other users of the
                                    Service. Full Membership rates vary depending on the length of your initial
                                    subscription. You may purchase an initial Full Membership subscription from
                                    available packages. You will be asked to choose an initial Full Membership
                                    subscription period when you sign up for Full Membership.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="content">
                            <label class="custom-checkbox">
                                <span>I affirm that I have read and agree to the <a href="#" target="_blank" class="color-main-text">Privacy Policy</a>,
                                    <a href="#" target="_blank" class="color-main-text">Terms of Use</a> and authorize my account to be charged the
                                    selected subscription rate until I cancel.
                                </span>
                                <input type="checkbox" id="payment-agree">
                                <span class="checkmark"></span>
                            </label>
                            
                            <p class="font-16 mb-2">This subscription is renewed every 30 days in the amount of 24.95 USD after the initial
                                period ends. To cancel your subscription click the "Settings" button located under the
                                "Account" tab found on your logged in Roomster home page and then click on the
                                "Subscription" link and choose "Cancel my subscription".</p>
                            <p class="font-16 mb-2">For security purposes we record your IP address: 103.121.221.83 —12/09/2019 07:23:47 AM
                            </p>
                            <p class="font-16 mb-2">When you press "I authorize this transaction", your card will be charged immediately.</p>
                            <div class="text-center">
                                <button class="btn btn-success btn-lg my-4" id="card_button" data-secret="{{ $intent->client_secret }}" disabled>I authorize this transaction</button>
                            </div>
                            <p class="font-16">All fees are charged in U.S. dollars. Charges will appear on your bill as "Roomster".
                            </p>
                            <p class="font-16 font-weight-bold">* This credit card page complies with California Senate Bill 340</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content area end -->
@endsection

@push('page-script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.getElementById('payment-agree').addEventListener('click', function(e){
        if(this.checked){
            document.getElementById('card_button').disabled = false;
        }else{
            document.getElementById('card_button').disabled = true;
        }
    })
</script>
<script>
    var stripe = Stripe("{{ config('services.stripe.key') }}");

    //create card
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#495057',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#495057'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var cardNumberElement = elements.create('cardNumber', {
        style: style,
        placeholder: 'Debit or Credit Card Number',
    });
    cardNumberElement.mount('#card-number-element');
    
    var cardExpiryElement = elements.create('cardExpiry', {
        style: style,
        placeholder: 'MM/YY',
    });
    cardExpiryElement.mount('#card-expiry-element');
    
    var cardCvcElement = elements.create('cardCvc', {
        style: style,
        placeholder: 'CVC',
    });
    cardCvcElement.mount('#card-cvc-element');

    // Handle real-time validation errors from the card Element.
    cardNumberElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    cardCvcElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    cardExpiryElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });


    // collecting information
    var firstName = document.getElementById('first_name');
    var lastName = document.getElementById('last_name');
    var address = document.getElementById('address');
    var country = document.getElementById('country');
    var state = document.getElementById('state');
    var city = document.getElementById('city');
    var zipCode = document.getElementById('zip_code');
    
    var cardButton = document.getElementById('card_button');
    var clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {

        const { setupIntent, error } = await stripe.handleCardSetup(
            clientSecret, cardNumberElement, {
                payment_method_data: {
                    billing_details: {
                        name: firstName.value + ' ' + lastName.value,
                        address: {
                            city: city.value,
                            country: 'US',
                            line1: address.value,
                            postal_code: zipCode.value,
                            state: state.value
                        }

                    }
                }
            }
        );
       

        if (error) {
            // console.log(error.message);
            alert(error.message);
        } else {
            console.log(setupIntent.payment_method);
            // The card has been verified successfully...

            axios.post('/upgrade/subscribed', {
                payment_method: setupIntent.payment_method,
                planId: '{{ $plan['id'] }}',
                name: firstName.value + ' ' + lastName.value,
                address: {
                    city: city.value,
                    country: 'US',
                    line1: address.value,
                    postal_code: zipCode.value,
                    state: state.value
                }
            })
            .then(res => {
                if(res.data == 310){
                    
                }else{
                    
                }
            })
            
        }
      
            
        
    });
    
</script>

@endpush

@push('page-css')
<style>
/**
* The CSS shown here will not be introduced in the Quickstart guide, but shows
* how you can use CSS to style your Element's container.
*/
.StripeElement {
box-sizing: border-box;
height: 45px;
padding: 12px 12px;
border: 1px solid #ced4da;
border-radius: 4px;
background-color: white;
}

.StripeElement--focus {
border-color: #80bdff;
}

.StripeElement--invalid {
border-color: #fa755a;
}

.StripeElement--webkit-autofill {
background-color: #fefde5 !important;
}
#card-errors {
height: 20px;
padding: 4px 0;
color: #fa755a;
}
</style>   

<style>
    /* The container */
    .custom-checkbox {
        display: inline-block;
        position: relative;
        margin-bottom: 15px;
        cursor: pointer;
        font-size: 20px;
        line-height: 1.5;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 0 0 0 46px;
    }

    /* Hide the browser's default checkbox */
    .custom-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 15px;
        left: 0;
        height: 30px;
        width: 30px;
        border: 2px solid #1e7e34;
        background-color: #fff;
    }

    /* On mouse-over, add a grey background color */
    .custom-checkbox:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .custom-checkbox input:checked~.checkmark {
        background-color: #1e7e34;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .custom-checkbox input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .custom-checkbox .checkmark:after {
        left: 11px;
        top: 7px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
@endpush