@extends('users.master')

@section('main-content')
<!-- content area start-->
<section class="payment p-2">
    <div class="container">
        <div class="row">
            <div class="col-md-11 m-auto">
                <h1 class="p-3 mb-3 font-weight-normal text-center">Payment</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="color-main-bg radius-10 font-20  text-white text-center pt-5 select-plan"
                            style="min-height: 380px">
                            <h2 class="display-4">{{ $plan['nickname'] }}</h2>
                            <p class="text-center d-inline-block text-white mt-5 mb-4">
                                <span class=" align-top font-20 font-weight-bold">$</span>
                                <span class="font-30">{{ $plan['amount'] / 100 }}</span>
                                <span class=" align-top font-20 font-weight-bold">{{ $plan['currency'] }}</span>
                            </p>
                            <span class="border border-white d-none d-md-block p-2 btn-block w-50 m-auto mt-3 rounded">Selected</span>
                        </div>
                        <p class="mt-3 font-16">You can cancel your subscription at any time</p>
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
                                                        <select name="" id="country" class="form-control form-control-lg">
                                                            @foreach ($countries as $code => $name)
                                                            <option value="{{ $code }}"> {{ $name }} </option>    
                                                            @endforeach
                                                        </select>                                            
                                                    </div>
                                                    <div class="col-md-6 mb-3 mb-md-0">
                                                        <select name="" id="state" class="form-control form-control-lg">
                                                            @foreach ($states as $code => $name)
                                                            <option value="{{ $name }}"> {{ $name }} </option>
                                                            @endforeach
                                                        </select>
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
                                    <p>Effective Date: {{ now()->toDayDateTimeString() }}</p>
                                </div>
                               <div class="terms">
                                    <h1 class="text-center font-40 mb-4">Gettingroom Corp. Terms of Use</h1>
                                    <p class="font-16 mb-4"> These Gettingroom Terms of Use apply when you access, use or visit the Gettingroom website
                                        located at www.gettingroom.com (the “Site”), the associated mobile application, and the services provided
                                        through
                                        the Site and mobile application that provide apartment renters, seekers, roommates, and room renters an
                                        opportunity
                                        to connect with each other (the Site, the mobile application and these services constituting the "Service"). The
                                        Service is provided to you by Gettingroom Corp. (referred to in these Terms of Use as “Gettingroom” “we,” “us”
                                        and
                                        “our”). You must agree to these Terms of Use in order to use the Service. If you do not agree with these Terms
                                        of
                                        Use at any time, please cease use of the Service.</p>
                                    <p class="font-16 mb-3"> <strong><em><span class="color-main-text" style="text-decoration: underline">Notice
                                                    Regarding Dispute Resolution:</span> These Terms of Use
                                                contain provisions that govern how claims you and we may have against each other are resolved (see
                                                Section
                                                14 below), including an agreement and obligation to arbitrate disputes, which will, subject to limited
                                                exceptions, require you to submit claims you have against us to binding arbitration, unless you opt-out
                                                in
                                                accordance with Section 14(E). Unless you opt-out of arbitration: (a) you will only be permitted to
                                                pursue
                                                claims against us on an individual basis, not as part of any class or representative action or
                                                proceeding
                                                and (b) you will only be permitted to seek relief (including monetary, injunctive, and declaratory
                                                relief)
                                                on an individual basis.</em></strong></p>
                                    <ol style="list-style-type: decimal;">
                                        <li> <strong>Updates to these Terms of Use.</strong> We may modify these Terms of Use from time to time. We will
                                            notify you of material changes to these Terms of Use by posting the amended terms on the Service at least
                                            thirty
                                            (30) days before the effective date of the changes. If you do not agree with the proposed changes, you
                                            should
                                            discontinue your use of the Service prior to the time the new Terms of Use take effect. If you continue
                                            using
                                            the Service after the new terms take effect, you will be bound by the modified Terms of Use. </li>
                                        <li> <strong>Privacy Policy.</strong> In connection with your use of the Service, please review our Privacy
                                            Policy,
                                            located at <a class="color-main-text" href="{{ url('privacy') }}"
                                                target="_blank">https://www.gettingroom.com/privacy</a>, to understand how we use information we collect
                                            from you when you access, visit or use the Service. The Privacy Policy is part of and is governed by these
                                            Terms
                                            of Use and by agreeing to these Terms of Use, you agree to be bound by the terms of the Privacy Policy and
                                            agree
                                            that we may use information collected from you in accordance with its terms. </li>
                                        <li> <strong class="mb-3 d-block">Member Accounts and Registration.</strong>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong><em>Member Registration.</em></strong> You can visit and browse the Service without
                                                    becoming a
                                                    registered member of the Service, but you will not be able to post listings on the Service, respond
                                                    to
                                                    listings on the Service, access interactive portions of the Service or otherwise post Contributions
                                                    (as
                                                    defined in Section 6(A) below) unless you are a registered member of the Service. You can become a
                                                    registered member of the Service by logging in to the Service through Facebook Connect. You
                                                    therefore
                                                    must have a valid and active account with Facebook in order to become a registered member of the
                                                    Service. By logging in to the Service through Facebook Connect, you grant us permission to access
                                                    and
                                                    use the information that Facebook shares with us when you register to use the Service through
                                                    Facebook
                                                    Connect, in accordance with the privacy policy of Facebook and the privacy settings that are
                                                    applicable
                                                    to your Facebook account. For more details on how you can manage the information provided to us by
                                                    Facebook, please review the privacy settings applicable to your Facebook account. We reserve the
                                                    right
                                                    to reject your member registration if, based on information provided to us through Facebook, we
                                                    determine that your Facebook account is invalid, inactive, or is not associated with an individual
                                                    person. If we reject your member registration, and you believe we have rejected your member
                                                    registration
                                                    in error, you may contact us at help@gettingroom.com. </li>
                                                <li> <strong><em>Member Accounts.</em></strong> If you sign up to become a registered member of the
                                                    Service,
                                                    you agree: (a) to provide true, accurate, current and complete information about yourself as
                                                    prompted by
                                                    the Service’s registration form (the “Registration Data”); (b) to maintain and promptly update the
                                                    Registration Data to keep it true, accurate, current and complete; and (c) that you will comply with
                                                    the
                                                    rules governing Contributions in Section 6(A) below. We reserve the right to refuse registration of,
                                                    or
                                                    to cancel, a member account in our reasonable discretion in accordance with applicable law. You will
                                                    be
                                                    responsible for maintaining the confidentiality of your member account. Gettingroom shall not be
                                                    liable
                                                    for any loss that you incur as a result of someone else using your member account, either with or
                                                    without your knowledge. You may be held liable for any losses incurred by Gettingroom due to any
                                                    unauthorized use of your member account. </li>
                                            </ol>
                                        </li>
                                        <li> <strong class="mb-3 d-block">Member Obligations</strong>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong><em>Representations and Warranties.</em></strong> When you use the Service, you represent
                                                    that:
                                                    (i) the information you submit is truthful and accurate; (ii) your use of the Service and your use
                                                    of
                                                    services available on the Service do not violate any applicable law or regulation; (iii) you are at
                                                    least eighteen (18) years of age and otherwise have legal capacity to legally enter into these Terms
                                                    of
                                                    Use, and (iv) if you are listing a room, house, apartment, or condominium (each room, house,
                                                    apartment
                                                    or condominium constituting an “Accommodation”) through the Service: (x) you own and/or have all
                                                    necessary rights and authority to offer for rent and to rent each Accommodation that you offer
                                                    through
                                                    the Service; and (y) you will accurately describe the subject Accommodation, will not fail to
                                                    disclose a
                                                    material defect in, or material information about, the Accommodation and will ensure that the
                                                    description of the Accommodation is accurate and not misleading. </li>
                                                <li> <strong><em>Compliance with Laws.</em></strong> You agree that you are solely responsible for and
                                                    agree
                                                    to abide by all laws, rules and regulations applicable to the listings that you post through the
                                                    Service, including but not limited to any and all laws, rules, regulations or other requirements
                                                    relating to taxes, permits or license requirements, zoning ordinances, safety compliance and
                                                    compliance
                                                    with all anti-discrimination and fair housing laws, as applicable. You will be solely responsible
                                                    for
                                                    the collection, withholding or payment of any occupancy or other taxes that may be applicable to the
                                                    Accommodation you list on the Service or use of the Service. </li>
                                                <li> <strong><em>Verification of Authority.</em></strong> If you are a tenant who is listing an
                                                    Accommodation through the Service, please refer to your rental contract or lease, or contact your
                                                    landlord, prior to listing the Accommodation to determine whether your rental contract or lease
                                                    contains
                                                    restrictions that would limit your ability to list the Accommodation. Listing your Accommodation may
                                                    be
                                                    a violation of your rental contract or lease, and could result in legal action against you by your
                                                    landlord, including possible eviction. </li>
                                                <li> <strong><em>Insurance.</em></strong> We do not provide liability insurance to members in connection
                                                    with the Service. Members are solely responsible for obtaining insurance coverage sufficient to
                                                    protect
                                                    their Accommodations. Members agree that they have or will obtain the appropriate insurance coverage
                                                    sufficient to cover the rental of the Accommodations they list on the Service. </li>
                                                <li> <strong><em>Risks Relating to the Service; Disclaimer.</em></strong> <strong>MEMBERS OF THE
                                                        SERVICE,
                                                        AND NOT GETTINGROOM, ARE SOLELY RESPONSIBLE FOR ACCOMMODATIONS LISTED ON THE SERVICE. WE HAVE NO
                                                        CONTROL OVER THE QUALITY, SAFETY, OR LEGALITY OF ANY ACCOMMODATION LISTED ON THE SERVICE, THE
                                                        TRUTH
                                                        OR ACCURACY OF A LISTING, THE ABILITY OF THE MEMBER TO OFFER THE LISTED ACCOMMODATION, OR THE
                                                        ABILITY OF OTHER MEMBERS TO PAY FOR ANY TRANSACTION. WE CANNOT ENSURE THAT ANY LISTING IS
                                                        ACCURATE
                                                        OR THAT ANY MEMBER WILL HONOR THE TERMS OF A LISTING OR ACTUALLY COMPLETE A TRANSACTION, AND WE
                                                        DO
                                                        NOT MAKE ANY REPRESENTATIONS AS TO THE QUALITY, LOCATION, AVAILABILITY, SUITABILITY, OR PRICING
                                                        OF
                                                        ANY SPECIFIC ACCOMMODATION LISTED ON THE SERVICE. WE ARE ALSO NOT RESPONSIBLE FOR ANY DAMAGE TO
                                                        REAL
                                                        PROPERTY, OR DAMAGE OR LOSS OF PERSONAL PROPERTY OR PERSONAL INJURY RESULTING IN CONNECTION WITH
                                                        ANY
                                                        TRANSACTION ENTERED INTO THROUGH USE OF THE SERVICE.</strong> </li>
                                            </ol>
                                        </li>
                                        <li> <strong class="mb-3 d-block">Subscription Fees and Automatic Renewals</strong>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong>Basic Membership.</strong> Becoming a member of the Service and creating a profile on the
                                                    Service is free. This membership level constitutes “Basic Membership”. Basic Membership allows you
                                                    to
                                                    search, post and contact other members of the Service for free. Basic Membership provides you with
                                                    access to potential roommates in each country where the Service is made available. With the Basic
                                                    Membership, you can: bookmark members you like, receive daily matches via email, get matched with
                                                    other
                                                    members with our keyword and personality matching services, and send emails to other members of the
                                                    Service to better introduce yourself. </li>
                                                <li> <strong>Full Membership.</strong> You will also have the ability to upgrade your Basic Membership
                                                    by
                                                    subscribing to a “Full Membership”. If you sign up for a Full Membership subscription you will have
                                                    access to all of the functionality provided as part of the Basic Membership plus access to a private
                                                    mailbox on the Service, access to social connections which link directly to social network profiles
                                                    added by other users of the Service, such as Facebook, LinkedIn, Twitter and Instagram, and access
                                                    to
                                                    the text/SMS or call options that will enable you to contact other users of the Service. Full
                                                    Membership
                                                    rates vary depending on the length of your initial subscription. You may purchase an initial Full
                                                    Membership subscription from available packages. You will be asked to choose an initial Full
                                                    Membership
                                                    subscription period when you sign up for Full Membership. </li>
                                                <li> <strong>Automatic Renewal.</strong> If you subscribe for Full Membership, your subscription will
                                                    automatically renew at the end of applicable initial subscription period, unless you elect to cancel
                                                    your subscription before the end of current subscription period. The cancellation will take effect
                                                    after
                                                    current subscription period ends, and your account will be downgraded to Basic Membership. If you do
                                                    not
                                                    cancel your subscription before the end of current subscription period, we will automatically charge
                                                    your payment account following the end of the applicable initial subscription period.&nbsp; </li>
                                                <li> <strong>How to Cancel Your Subscription.</strong> You can cancel your Full Membership subscription
                                                    at
                                                    any time by (i) logging in to the Service, (ii) clicking on the “Settings” button located under the
                                                    “Account” tab found on your member home page, and (iii) clicking on the “Subscription” link and
                                                    choosing
                                                    “Cancel my Subscription”. If you cancel your Full Membership subscription, you may be entitled to a
                                                    refund in accordance with Section 5(F) below, , you will have access to the Full Membership
                                                    functionality until the end of the period for which payment was made, and no additional fees will be
                                                    charged to your payment account following the date of cancellation. Following cancellation of a Full
                                                    Membership subscription, you will continue to have access to the Basic Membership functionality
                                                    unless
                                                    you also delete your account in its entirety. If you have a Full Membership subscription, you will
                                                    only
                                                    be able to delete your account after you cancel your Full Membership subscription. All canceled
                                                    accounts
                                                    can be re-activated at any time in the future. Member accounts can only be cancelled by the account
                                                    holder through the procedure described above. We do not accept cancellations by e-mail. </li>
                                                <li> <strong>Special Cancellation Instructions for Mobile Application Users.</strong> If you sign up and
                                                    pay
                                                    for a Full Subscription using a third party service through which you have downloaded one of our
                                                    mobile
                                                    applications, e.g., the Apple App Store or Google Play Store (each, a “Third Party App Store”), your
                                                    payment will be processed by the Third Party App Store through which you downloaded the mobile
                                                    application and you must cancel your Service subscription through the applicable Third Party App
                                                    Store.
                                                </li>
                                                <li> <strong>Refund Policy.</strong> Refunds are only available if there have been no Services rendered
                                                    to
                                                    the User.&nbsp;lf you cancel your Full Membership subscription on or prior to the end of the initial
                                                    subscription period, you will not receive a refund for any fees paid for the initial subscription
                                                    period. However, if your Full Membership subscription automatically renews as described in Section
                                                    5(C),
                                                    and if you cancel your Full Membership subscription before the end of current subscription period,
                                                    you
                                                    will be entitled to receive a pro rata refund of the amount you paid for the applicable subscription
                                                    period based on the number of days remaining in the current subscription period. So, for example, if
                                                    you
                                                    cancel your subscription on day 10 of an applicable 30 day period, and you were charged $45.95 in
                                                    connection with the applicable 30 day period, you will be entitled to a pro rata refund for the
                                                    remaining 20 days of the 30 day period in an amount equal to $30.63. In order to request a refund,
                                                    you
                                                    must first cancel your subscription as described in Section 5(D) above, then contact Customer
                                                    Service
                                                    for refunds. A 15% handling fee will be applied to all refunds. </li>
                                            </ol>
                                        </li>
                                        <li> <strong style="text-decoration: underline;" class="mb-3 d-block">Rules Governing User Contributions;
                                                Prohibited
                                                Activities.</strong>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong>User Contributions.</strong> If you are a member of the Service and you are logged in to
                                                    your
                                                    member account, you may be able to submit listings, comments and content to the Service
                                                    (collectively,
                                                    “Contributions”). You are entirely responsible for the content of, and any harm resulting from, any
                                                    Contributions that you post on or through the Service. You understand and agree that, unless
                                                    expressly
                                                    stated, Gettingroom in no way controls, verifies, or endorses any of the information provided by
                                                    users
                                                    and members of the Service, including links, messages, and listings. When you create or make
                                                    available a
                                                    Contribution on or through the Service, you represent and warrant that you:
                                                    <ol style="list-style-type: lower-roman;">
                                                        <li> own or have sufficient rights to post your Contributions on or through the Service; </li>
                                                        <li> will not post Contributions that violate our or any other person’s privacy rights,
                                                            publicity
                                                            rights, intellectual property rights (including without limitation copyrights) or contract
                                                            rights; </li>
                                                        <li> have fully complied with any third-party licenses relating to Contributions and shall pay
                                                            all
                                                            royalties, fees and any other monies required to be paid in connection with Contributions
                                                            that
                                                            you post on or through the Service; </li>
                                                        <li> will not post Contributions that: (a) are defamatory, damaging, disruptive, unlawful,
                                                            inappropriate, offensive, inaccurate, pornographic, vulgar, indecent, profane, hateful,
                                                            racially
                                                            or ethnically offensive, obscene, lewd, lascivious, filthy, threatening, excessively
                                                            violent,
                                                            harassing, or otherwise objectionable; (b) incite, encourage or threaten immediate physical
                                                            harm
                                                            against another, including but not limited to, Contributions that promote racism, bigotry,
                                                            sexism, religious intolerance or harm against any group or individual; or (c) contain
                                                            material
                                                            that solicits personal information from anyone under the age of 13 or exploits anyone in a
                                                            sexual or violent manner; </li>
                                                        <li> will not post Contributions that contain advertisements or solicit any person to buy or
                                                            sell
                                                            products or services; and </li>
                                                        <li> will not post Contributions that constitute, contain, install or attempt to install or
                                                            promote
                                                            spyware, malware or other computer code, whether on our or others’ computers or equipment,
                                                            designated to enable you or others to gather information about or monitor the on-line or
                                                            other
                                                            activities of another party. </li>
                                                    </ol>
                                                </li>
                                                <li> <strong>Prohibited Activities.</strong> In addition to the obligations described in Section 6(A),
                                                    you
                                                    agree that in connection with your use of the Service, you will not:
                                                    <ol style="list-style-type: lower-roman;">
                                                        <li> use the Service for any unauthorized purpose including collecting usernames and/or email
                                                            addresses of other users by electronic or other means for the purpose of sending unsolicited
                                                            email or other electronic communications, or engaging in unauthorized framing of, or linking
                                                            to,
                                                            the Service without our express written consent; </li>
                                                        <li> transmit chain letters, bulk or junk email or interfere with, disrupt, or create an undue
                                                            burden on the Service or the networks or services connected to the Service, including
                                                            without
                                                            limitation, hacking into the Service, or using the system to send unsolicited or commercial
                                                            emails, bulletins, comments or other communications; </li>
                                                        <li> impersonate any other person or entity, sell or let others use your profile or password,
                                                            provide false or misleading identification or address information, or invade the privacy, or
                                                            violate the personal or proprietary right, of any person or entity; </li>
                                                        <li> post advertisements or solicitations for jobs or employment on the Service, or otherwise
                                                            use
                                                            the Service to hire any person to perform work, including, without limitation, posting
                                                            advertisements or solicitations for modeling jobs or talent or talent scouting positions on
                                                            the
                                                            Service; </li>
                                                        <li> post on the Service any franchise, pyramid scheme, “club membership,” distributorship or
                                                            sales
                                                            representative agency arrangement or other business opportunity which requires an up-front
                                                            or
                                                            periodic payment, pays commissions, or requires recruitment of other members,
                                                            sub-distributors
                                                            or sub-agents; </li>
                                                        <li> decompile, disassemble, modify, translate, adapt, reverse engineer, create derivative works
                                                            from or sublicense the Service, or any portion thereof; or </li>
                                                        <li> circumvent, disable or otherwise interfere with security related features of the Service or
                                                            features that prevent or restrict use or copying of any Materials (as defined in Section 8)
                                                            or
                                                            enforce limitations on use of the Service or the Materials on the Service. </li>
                                                    </ol>
                                                </li>
                                                <li> <strong>Social Media Guidelines.</strong> If you access or use any of our social media pages on
                                                    Facebook, Pinterest, Twitter, Instagram or YouTube, or post any reviews or comments regarding your
                                                    use
                                                    of the Service on these social media services or other third party websites, we ask you to follow
                                                    the
                                                    following guidelines:
                                                    <ol style="list-style-type: lower-roman;">
                                                        <li> please be polite and courteous. excessive name calling, profanity, fighting words,
                                                            discriminatory epithets, sexual harassment, bullying, gruesome language or the like, are not
                                                            acceptable. </li>
                                                        <li> all postings should come from a real person. we will delete any postings from our social
                                                            media
                                                            pages that we believe have come from fake or anonymous profiles. </li>
                                                        <li> please verify that all information submitted is accurate and factual. negative comments and
                                                            complaints posted by you could be construed as claims about gettingroom or an individual and
                                                            may
                                                            be subject to libel laws and other legal claims. </li>
                                                        <li> we would like to hear about your complaints or concerns regarding the service before you
                                                            share
                                                            them publicly with others so that we can help resolve them for you. if you are a user and
                                                            have a
                                                            customer service comment, complaint, concern or idea, please email us at
                                                            help@gettingroom.com.
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                        </li>
                                        <li> <strong class="mb-3 d-block">Rights in Contributions</strong>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong>Ownership of Contributions.</strong> We do not claim any ownership rights in the
                                                    Contributions
                                                    that you post on or through the Service. After posting your Contributions on the Service, you
                                                    continue
                                                    to retain any rights you may have in your Contributions, including any intellectual property rights
                                                    or
                                                    other proprietary rights associated with your Contributions, subject to the license you grant to us
                                                    below. </li>
                                                <li> <strong>Grant of License to Us for Contributions.</strong> By making a Contribution to the Service,
                                                    you
                                                    grant us a perpetual, non-exclusive (meaning you are free to license your Contribution to anyone
                                                    else in
                                                    addition to us), fully-paid, royalty-free (meaning that we are not required to pay you to use your
                                                    Contribution), sublicensable (so that we can use affiliates, subcontractors and other partners to
                                                    make
                                                    the Service available to you) and worldwide (because the Internet is global in reach) license to
                                                    use,
                                                    modify, create derivative works of, publicly perform, publicly display, reproduce, disseminate,
                                                    market
                                                    and distribute the Contribution in connection with the Service, our business, or the promotion of
                                                    the
                                                    Service or our business in any media formats and through any media channels now known or
                                                    subsequently
                                                    created. If you cancel your membership or we terminate your access to the Service, your
                                                    Contributions
                                                    and other information and data related to your user account will no longer be accessible through the
                                                    Service, however we may retain your Contributions in our archived files and your Contributions may
                                                    continue to be used by and accessible to other users of the Service, for example, because your
                                                    Contributions were saved or re-shared by other users of the Service. </li>
                                            </ol>
                                        </li>
                                        <li> <strong class="mb-3 d-block">Our Intellectual Property Rights.</strong> Except for your Contributions and
                                            the Contributions of
                                            other
                                            users of the Service, all of the content on the Service (“Materials”) and the trademarks, service marks, and
                                            logos contained on the Service, are owned by or licensed to us and are subject to copyright and other
                                            intellectual property rights under United States and foreign laws and international conventions. The Service
                                            and
                                            the Materials are for your information and personal use only and not for commercial exploitation. We reserve
                                            all
                                            rights in and to the Service and the Materials. If you download or print a copy of the Materials for your
                                            own
                                            personal use, you must retain all trademark, copyright and other proprietary notices contained in and on the
                                            Materials. </li>
                                
                                        <li> <strong>Third Party App Stores.</strong> You acknowledge and agree that the availability of the Service may
                                            be
                                            dependent on Third Party App Stores. You acknowledge that these Terms of Use are between you and Gettingroom
                                            and
                                            not with the applicable Third Party App Store. Each Third Party App Store may have its own terms and
                                            conditions
                                            to which you must agree before downloading the Service from it. You agree to comply with, and your license
                                            to
                                            use the Service is conditioned upon, your compliance with, the applicable Third Party App Store terms and
                                            conditions. To the extent that other terms and conditions from the applicable Third Party App Store are less
                                            restrictive than, or otherwise conflict with, the terms and conditions of these Terms of Use, the more
                                            restrictive or conflicting terms and conditions in these Terms of Use will apply. </li>
                                        <li> <strong>Third Party Sites.</strong> The Service may contain links to websites operated by third parties
                                            (“Third
                                            Party Sites”), and you may be able to share Contributions or other information with Third Party Sites
                                            through
                                            links on the Service; however, we do not own or operate the Third Party Sites, and we have not reviewed, and
                                            cannot review, all of the material, including goods or services, made available through Third Party Sites.
                                            The
                                            availability of these links on the Service does not represent, warrant or imply that we endorse any Third
                                            Party
                                            Sites or any materials, opinions, goods or services available on them. Third party materials accessed
                                            through or
                                            used by means of the Third Party Sites may also be protected by copyright and other intellectual property
                                            laws.
                                            THESE TERMS OF USE DO NOT APPLY TO THIRD PARTY SITES. BEFORE VISITING A THIRD PARTY SITE THROUGH LINKS OR
                                            OTHER
                                            MEANS PROVIDED ON OR THROUGH THE SERVICE, YOU SHOULD REVIEW THE THIRD PARTY SITE’S TERMS AND CONDITIONS AND
                                            PRIVACY POLICY, AND INFORM YOURSELF OF THE REGULATIONS, POLICIES AND PRACTICES OF THESE THIRD PARTY SITES.
                                        </li>
                                        <li> <strong class="mb-3 d-block">Warranty Disclaimer; Limitation on Liability</strong>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong class="mb-3 d-block"><em>Disclaimer of Warranties</em></strong>
                                                    <ol style="list-style-type: lower-roman;">
                                                        <li> TO THE EXTENT PERMITTED BY APPLICABLE LAW, ALL MATERIALS, CONTRIBUTIONS OR ANY OTHER
                                                            MATERIALS
                                                            OR ITEMS PROVIDED THROUGH THE SERVICE ARE PROVIDED “AS IS” AND “AS AVAILABLE,” WITHOUT
                                                            WARRANTY
                                                            OR CONDITIONS OF ANY KIND. BY OPERATING THE SERVICE, WE DO NOT REPRESENT OR IMPLY THAT WE
                                                            ENDORSE ANY CONTRIBUTIONS OR ANY OTHER MATERIALS OR ITEMS AVAILABLE ON OR LINKED TO BY THE
                                                            SERVICE, INCLUDING WITHOUT LIMITATION, CONTENT HOSTED ON THIRD PARTY SITES, OR THAT WE
                                                            BELIEVE
                                                            CONTRIBUTIONS OR ANY OTHER MATERIALS OR ITEMS TO BE ACCURATE, USEFUL OR NON-HARMFUL. WE
                                                            CANNOT
                                                            GUARANTEE AND DO NOT PROMISE ANY SPECIFIC RESULTS FROM USE OF THE SERVICE. NO ADVICE OR
                                                            INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM US SHALL CREATE ANY WARRANTY NOT
                                                            EXPRESSLY STATED IN THESE TERMS OF USE. YOU AGREE THAT YOUR USE OF THE SERVICE WILL BE AT
                                                            YOUR
                                                            SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, WE AND EACH OF OUR ADVERTISERS,
                                                            LICENSORS,
                                                            SUPPLIERS, OFFICERS, DIRECTORS, INVESTORS, EMPLOYEES, AGENTS, SERVICE PROVIDERS AND OTHER
                                                            CONTRACTORS DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SERVICE AND
                                                            YOUR
                                                            USE THEREOF. </li>
                                                        <li> TO THE EXTENT PERMITTED BY APPLICABLE LAW, WE MAKE NO WARRANTIES OR REPRESENTATIONS ABOUT
                                                            THE
                                                            ACCURACY, RELIABILITY, TIMELINESS OR COMPLETENESS OF THE SERVICE’S CONTENT, THE CONTENT OF
                                                            ANY
                                                            SITE LINKED TO THE SERVICE, CONTRIBUTIONS, INFORMATION OR ANY OTHER ITEMS OR MATERIALS ON
                                                            THE
                                                            SERVICE OR LINKED TO BY THE SERVICE. WE ASSUME NO LIABILITY OR RESPONSIBILITY FOR ANY (A)
                                                            ERRORS, MISTAKES OR INACCURACIES OF CONTENT AND MATERIALS, (B) PERSONAL INJURY OR PROPERTY
                                                            DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SERVICE, (C)
                                                            ANY
                                                            UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION
                                                            STORED THEREIN, (D) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE SERVICE,
                                                            (E)
                                                            ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE, WHICH MAY BE TRANSMITTED TO OR THROUGH THE
                                                            SERVICE BY ANY THIRD PARTY, AND/OR (F) ANY ERRORS OR OMISSIONS IN ANY CONTENT AND MATERIALS
                                                            OR
                                                            FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED,
                                                            TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SERVICE. </li>
                                                    </ol>
                                                </li>
                                                <li> <strong><em>Limited Liability.</em></strong> TO THE EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT
                                                    SHALL WE BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY INDIRECT, CONSEQUENTIAL, INCIDENTAL, SPECIAL OR
                                                    PUNITIVE DAMAGES, INCLUDING LOST PROFIT DAMAGES ARISING FROM YOUR USE OF THE SERVICE, CONTRIBUTIONS,
                                                    MATERIALS OR ANY OTHER CONTENT THEREIN. NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED IN THESE
                                                    TERMS OF USE, OUR LIABILITY TO YOU IN RESPECT OF ANY LOSS OR DAMAGE SUFFERED BY YOU AND ARISING OUT
                                                    OF
                                                    OR IN CONNECTION WITH THESE TERMS OF USE, WHETHER IN CONTRACT, TORT OR FOR BREACH OF STATUTORY DUTY
                                                    OR
                                                    IN ANY OTHER WAY SHALL NOT EXCEED $50. </li>
                                                <li> <strong><em>Exceptions to Disclaimers and Liability Limitations.</em> </strong> SOME STATES OR
                                                    JURISDICTIONS DO NOT ALLOW THE LIMITATION OR EXCLUSION OF CERTAIN WARRANTIES, OR THE EXCLUSION OR
                                                    LIMITATION OF CERTAIN DAMAGES. IF YOU RESIDE IN ONE OF THESE STATES OR JURISDICTIONS, THE
                                                    LIMITATIONS OR
                                                    EXCLUSIONS in Sections 12(a) and 12(B) MAY NOT APPLY TO YOU. </li>
                                            </ol>
                                        </li>
                                        <li> <strong>Indemnity.</strong> YOU HEREBY AGREE, AT YOUR EXPENSE, TO INDEMNIFY, DEFEND AND HOLD HARMLESS
                                            GETTINGROOM, ITS OFFICERS, DIRECTORS AND EMPLOYEES FROM AND AGAINST ANY LOSS, COST, DAMAGES, LIABILITY,
                                            AND/OR
                                            EXPENSE, INCLUDING REASONABLE ATTORNEY FEES, ARISING OUT OF OR RELATING TO (A) THIRD PARTY CLAIMS, ACTIONS
                                            OR
                                            ALLEGATIONS OF INFRINGEMENT BASED ON INFORMATION, DATA OR CONTENT YOU SUBMITTED IN CONNECTION WITH THE
                                            SERVICE,
                                            (B) ANY FRAUD OR MANIPULATION, OR OTHER BREACH OF THIS AGREEMENT, BY YOU, OR (C) THIRD PARTY CLAIMS, ACTIONS
                                            OR
                                            ALLEGATIONS BROUGHT AGAINST GETTINGROOM ARISING OUT OF YOUR USE OF THE SERVICE OR THE SITE, INCLUDING, BUT
                                            NOT
                                            LIMITED TO, CLAIMS ALLEGING ILLEGAL DISCRIMINATION. <strong>YOU WILL NOT BE REQUIRED TO INDEMNIFY AND HOLD
                                                GETTINGROOM HARMLESS FROM AND AGAINST ANY CLAIMS, LIABILITIES, DAMAGES, LOSSES, OR EXPENSES RESULTING
                                                FROM
                                                GETTINGROOM’S OWN NEGLIGENT CONDUCT.</strong> </li>
                                        <li> <strong class="mb-3 d-block">LEGAL DISPUTES AND ARBITRATION AGREEMENT</strong> <span
                                                style="text-decoration: underline">Please
                                                Read
                                                This Following Clause Carefully – It May Significantly Affect Your Legal Rights, Including Your Right to
                                                File a Lawsuit in Court</span>
                                            <ol style="list-style-type: upper-alpha;">
                                                <li> <strong><em>Initial Dispute Resolution.</em></strong> We are available by email at
                                                    help@gettingroom.com
                                                    to address any concerns you may have regarding your use of the Service. Most concerns may be quickly
                                                    resolved in this manner. Each of you and Gettingroom agree to use best efforts to settle any
                                                    dispute,
                                                    claim, question, or disagreement directly through consultation and good faith negotiations which
                                                    shall
                                                    be a precondition to either party initiating a lawsuit or arbitration. </li>
                                                <li> <strong><em>Agreement to Binding Arbitration.</em></strong> If we do not reach an agreed upon
                                                    solution
                                                    within a period of thirty (30) days from the time informal dispute resolution is pursued pursuant to
                                                    Section 14(A) above, then either party may initiate binding arbitration. All claims arising out of
                                                    or
                                                    relating to these Terms of Use (including their formation, performance and breach), the parties’
                                                    relationship with each other and/or your use of the Service shall be finally settled by binding
                                                    arbitration administered on a confidential basis by JAMS, in accordance with the JAMS Streamlined
                                                    Arbitration Rules and Procedures, excluding any rules or procedures governing or permitting class
                                                    actions. Each party will have the right to use legal counsel in connection with arbitration at its
                                                    own
                                                    expense. The parties shall select a single neutral arbitrator in accordance with the JAMS
                                                    Streamlined
                                                    Arbitration Rules and Procedures. The arbitrator, and not any federal, state or local court or
                                                    agency,
                                                    shall have exclusive authority to resolve all disputes arising out of or relating to the
                                                    interpretation,
                                                    applicability, enforceability or formation of these Terms of Use, including, but not limited to, any
                                                    claim that all or any part of these Terms of Use is void or voidable. The arbitrator shall be
                                                    empowered
                                                    to grant whatever relief would be available in a court under law or in equity. The arbitrator’s
                                                    award
                                                    shall be in writing and provide a statement of the essential findings and conclusions, shall be
                                                    binding
                                                    on the parties and may be entered as a judgment in any court of competent jurisdiction. The
                                                    interpretation and enforcement of these Terms of Use shall be subject to the Federal Arbitration
                                                    Act.
                                                    <strong>The JAMS rules governing the arbitration may be accessed at <a class="color-main-text"
                                                            href="https://www.jamsadr.com/adr-rules-procedures"
                                                            target="_blank">https://www.jamsadr.com/adr-rules-procedures</a>. If you initiate
                                                        arbitration,
                                                        to the extent the filing fee for the arbitration exceeds Two Hundred and Fifty U.S. Dollars
                                                        ($250.00), we will pay the additional cost. If we are required to pay the additional cost of the
                                                        filing fees, you should submit a request for payment of fees to JAMS along with your form for
                                                        initiating the arbitration, and we will make arrangements to pay all necessary fees directly to
                                                        JAMS. We will also be responsible for paying all other arbitration costs arising in connection
                                                        with
                                                        the arbitration. You will not be required to pay fees and costs incurred by Gettingroom if you
                                                        do
                                                        not prevail in arbitration.</strong> <strong>The parties understand that, absent this mandatory
                                                        provision, they would have the right to sue in court and have a jury trial. They further
                                                        understand
                                                        that, in some instances, the costs of arbitration could exceed the costs of litigation and the
                                                        right
                                                        to discovery may be more limited in arbitration than in court.</strong> </li>
                                                <li> <strong><em>Class Action and Class Arbitration Waiver.</em></strong> You and Gettingroom each
                                                    further
                                                    agree that any arbitration shall be conducted in your respective individual capacities only and not
                                                    as a
                                                    class action or other representative action, and you and Gettingroom each expressly waive your
                                                    respective right to file a class action or seek relief on a class basis. If any court or arbitrator
                                                    determines that the class action waiver set forth in this paragraph is void or unenforceable for any
                                                    reason or that an arbitration can proceed on a class basis, then the arbitration provision set forth
                                                    above in Section 14(B) shall be deemed null and void in its entirety and the parties shall be deemed
                                                    to
                                                    have not agreed to arbitrate disputes. </li>
                                                <li> <strong><em>Exception - Small Claims Court Claims.</em></strong> Notwithstanding the parties’
                                                    agreement
                                                    to resolve all disputes through arbitration, either party may seek relief in a small claims court
                                                    for
                                                    disputes or claims within the scope of that court’s jurisdiction. </li>
                                                <li> <strong><em>30 Day Right to Opt Out.</em></strong> You have the right to opt-out and not be bound
                                                    by
                                                    the arbitration and class action waiver provisions set forth in Sections 14(B), 14(C), and 14(D) by
                                                    sending written notice of your decision to opt-out to the following email: help@gettingroom.com. The
                                                    notice must be sent within thirty (30) days of registering to use the Service, otherwise you shall
                                                    be
                                                    bound to arbitrate disputes in accordance with the terms of those sections. If you opt-out of these
                                                    arbitration provisions, we also will not be bound by them. </li>
                                                <li> <strong><em>Exclusive Venue for Litigation.</em></strong> To the extent that the arbitration
                                                    provisions
                                                    set forth in Section 14(B) do not apply, of if you want to pursue any legal remedies to which you
                                                    would
                                                    otherwise be entitled but that are not available to you pursuant to this Section 14, the parties
                                                    agree
                                                    that any litigation between them shall be filed exclusively in state or federal courts located in
                                                    New
                                                    York County, New York (except for small claims court actions which may be brought in the county
                                                    where
                                                    you reside). The parties expressly consent to exclusive jurisdiction in New York for any litigation
                                                    other than small claims court actions. </li>
                                            </ol>
                                        </li>
                                        <li> <strong>Notice to New Jersey Users.</strong> Notwithstanding any terms set forth in these Terms of Use, if
                                            any
                                            of the provisions set forth in Sections 12, 13 or 14 are held unenforceable, void or inapplicable under New
                                            Jersey law, then any such provision shall not apply to you but the rest of these Terms of Use shall remain
                                            binding on you and Gettingroom. In addition, for New Jersey residents, the limitation on liability is
                                            inapplicable where attorneys’ fees, court costs, or other damages are mandated by statute. Notwithstanding
                                            any
                                            provision in these Terms of Use, nothing in these Terms of Use is intended to, nor shall it be deemed or
                                            construed to, limit any rights available to you under the Truth-in-Consumer Contract, Warranty and Notice
                                            Act.
                                        </li>
                                        <li> <strong>Notice to California Users.</strong> Under California Civil Code Section 1789.3, users located in
                                            California are entitled to the following consumer rights notice: If a user has a question or complaint
                                            regarding
                                            the Service, please send an email to help@gettingroom.com. Users may also contact us by writing to 285 West
                                            Broadway, Suite 320, New York, NY 10013, USA. California residents may reach the Complaint Assistance Unit
                                            of
                                            the Division of Consumer Services of the California Department of Consumer Affairs by mail at 1625 North
                                            Market
                                            Blvd., Suite N 112, Sacramento, CA 95834, or by telephone at (916) 445-1254 or (800) 952-5210. </li>
                                        <li> <strong>Notice to International Users.</strong> The Service is controlled and operated by Gettingroom from
                                            its
                                            offices in the United States. We do not make any representations that the Service or any Materials are
                                            available
                                            or appropriate for use in your location. You agree to comply with all local rules applicable to you
                                            regarding
                                            user conduct on the Internet and acceptable content. You also agree to comply with all applicable laws
                                            regarding
                                            the transmission of technical data exported from the United States or the country in which you reside. </li>
                                        <li> <strong>No Modifications by Our Employees.</strong> If any of our employees offers to modify the terms of
                                            these
                                            Terms of Use, he or she is not acting as an agent for us or speaking on our behalf. You may not rely, and
                                            should
                                            not act in reliance on, any statement or communication from our employees or anyone else purporting to act
                                            on
                                            our behalf. </li>
                                        <li> <strong>Independent Contractors</strong>. Nothing in these Terms of Use shall be deemed to create an
                                            agency,
                                            partnership, joint venture, employer-employee or franchisor-franchisee relationship of any kind between us
                                            and
                                            any user. </li>
                                        <li> <strong>Non-Waiver.</strong> Our failure to exercise or enforce any right or provision of these Terms of
                                            Use
                                            shall not operate as a waiver of the applicable right or provision. </li>
                                        <li> <strong>Severability.</strong> These Terms of Use operate to the fullest extent permissible by law. If any
                                            provision or part of a provision of these Terms of Use is unlawful, void, or unenforceable, that provision
                                            or
                                            part of the provision is deemed severable from these Terms of Use and shall not affect the validity and
                                            enforceability of any remaining provisions. </li>
                                        <li> <strong>Assignment.</strong> We may assign our rights under these Terms of Use without your approval. </li>
                                        <li> <strong>Entire Agreement.</strong> These Terms of Use constitutes the complete and exclusive understanding
                                            and
                                            agreement of the parties relating to the subject matter hereof and supersedes all prior understandings,
                                            proposals, agreements, negotiations, and discussions between the parties, whether written or oral. </li>
                                        <li> <strong>Contact Information.</strong> If you have any questions about the Service of these Terms of Use,
                                            you
                                            can contact Gettingroom Corp. by email at help@gettingroom.com</li>
                                    </ol>
                                </div>
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
                            
                            <p class="font-16 mb-2">After ending the initial period the subscription will be automatically renewed for a monthly membership plan in the
                            amount of monthly package. To cancel your subscription click the "Settings" button located under the "Account" tab found
                            on your logged in GettingRoom home page and then click on the "Subscription" link and choose "Cancel my subscription".</p>
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
                            country: country.value,
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
            axios.post('/upgrade/subscribed', {
                payment_method: setupIntent.payment_method,
                planId: '{{ $plan['id'] }}',
                name: firstName.value + ' ' + lastName.value,
                address: {
                    city: city.value,
                    country: country.value,
                    line1: address.value,
                    postal_code: zipCode.value,
                    state: state.value
                }
            })
            .then(res => {
                if(res.data == 'success'){
                    window.location.href = '/upgrade/thank';
                }else{
                    alert(res.data);
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
    
    .terms p,
    .terms li {
        margin-bottom: 15px;
    }
  
    
</style>
@endpush