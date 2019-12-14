@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selected Plan: {{ $plan }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="label" for="card-holder-name">Card Holder Name</div>
                        <input id="card-holder-name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element" class="form-control"></div>
                    </div>
                    
                    <button id="card-button" class="btn btn-success" data-secret="{{ $intent->client_secret }}">
                        Update Payment Method
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-script')

<script src="https://js.stripe.com/v3/"></script>

<script>
    window.addEventListener('load', function() {

        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    
        const elements = stripe.elements();
        const cardElement = elements.create('card');
    
        cardElement.mount('#card-element');
    
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        
        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                    }
                }
            );
        
            if (error) {
            // Display "error.message" to the user...
            } else {
                console.log(setupIntent.payment_method);
            // The card has been verified successfully...
                axios.post('/upgrade/subscribed', {
                    payment_method: setupIntent.payment_method,
                    planId: '{{ $plan }}'
                })
                .then(res => {
                    console.log(res.data);
                    alert('payment accepted');
                })
            }
        });
    });
</script>
@endpush