@extends('layout.app')



@section('body-section')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Settings</h4>


                    <form action="{{ route('settings') }}" method="POST">
                        @csrf

                        <x-form-field type="text" label="Payment Api Key" name="payment_api_key" id="input-payment_api_key"
                            placeholder="Enter Api Key" value="{{ $settings?->payment_api_key }}" />

                        <x-form-field type="number" label="Payment Tax Percent" name="payment_tax" id="input-payment_tax"
                            placeholder="Enter Tax Percent" value="{{ $settings?->payment_tax }}" />

                        <x-form-field type="text" label="Home Title" name="home_title" id="input-home_title"
                            placeholder="Enter Home Title" value="{{ $settings?->home_title }}" />


                        <x-form-field type="text" label="Contact Email" name="contact_email" id="input-contact_email"
                            placeholder="Enter Contact Email" value="{{ $settings?->contact_email }}" />
                            
                           <x-form-field type="text" label="Contact Number" name="contact_number" id="input-contact_number"
                            placeholder="Enter Contact Number" value="{{ $settings?->contact_number }}" />


                              <x-form-field type="url" label="Facebook Link" name="facebook_link" id="input-facebook_link"
                            placeholder="Enter Facebook Link" value="{{ $settings?->facebook_link }}" />

                             <x-form-field type="url" label="Instagram Link" name="instagram_link" id="input-instagram_link"
                            placeholder="Enter Instagram Link" value="{{ $settings?->instagram_link }}" />

                             <x-form-field type="url" label="Linkedin Link" name="linkedin_link" id="input-linkedin_link"
                            placeholder="Enter Linkedin Link" value="{{ $settings?->linkedin_link }}" />

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
