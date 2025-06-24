@extends('layout.app')



@section('body-section')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Order</h4>


                    <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
                        @csrf

                        <x-form-field type="text" label="User Email" name="user_email" id="input-user_email"
                            placeholder="Enter User Email" value="{{ $order->user_email }}" />

                        <x-form-field type="text" label="User Name" name="user_name" id="input-user_name"
                            placeholder="Enter User Name" value="{{ $order->user_name }}" />

                        <x-form-field type="text" label="User Phone" name="user_phone" id="input-user_phone"
                            placeholder="Enter User Phone" value="{{ $order->user_phone }}" />


                        <x-form-field type="text" label="Street Address" name="shipping_street_address"
                            id="input-shipping_street_address" placeholder="Enter Street Address"
                            value="{{ $order->shipping_street_address }}" />

                        <x-form-field type="text" label="City" name="shipping_city" id="input-shipping_city"
                            placeholder="Enter City" value="{{ $order->shipping_city }}" />

                        <x-form-field type="text" label="State / Province" name="shipping_state_province"
                            id="input-shipping_state_province" placeholder="Enter State or Province"
                            value="{{ $order->shipping_state_province }}" />

                        <x-form-field type="number" label="Postal Code" name="shipping_postal_code"
                            id="input-shipping_postal_code" placeholder="Enter Postal Code"
                            value="{{ $order->shipping_postal_code }}" />

                        <x-form-field type="text" label="Country" name="shipping_country" id="input-shipping_country"
                            placeholder="Enter Country Code (e.g. IN)" value="{{ $order->shipping_country }}" />


                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
