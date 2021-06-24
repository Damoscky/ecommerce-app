@extends('layouts.mail.app')

@section('title', 'PRODUCT DEACTIVATED')

@section('content')
    <div class="card-text-area">
        <div class="verified-logo-holder">
            <img class="verified-logo" src="{{ asset('images/checked.png') }}" alt="Product Status" />
            <h3 class="confirmation-text"> PRODUCT DEACTIVATED</h3>
        </div>

        <div class="order-text">
            <h4>PRODUCT {{ $data['product']['product_name'] }} has been deactivated</h4>
        </div>

        <p class="greeting-text">Hi, {{ $data['user']['name'] }}</p>
        <p class="thank-you-text">
            This is to inform you that your product has been deactivated because the product image it did not comply to our standards.
        </p>

        <p class="thank-you-text">
            Please kindly upload an image that comply to our standard.
        </p>


        <div class="my-4 track-order bg-white">
            <p class="font-weight-bold bg-white">
                You can follow the status of your product by clicking the button
                below
            </p>

            <a href="{{ url(env('CLIENT_BASE_URL') . 'products' . {{ $data['product']['id'] }} ) }}" class="track-order-btn">View order Status</a>
        </div>
        </div>
    </div>
@endsection
