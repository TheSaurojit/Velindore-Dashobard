@extends('layout.app')



@section('body-section')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create Label</h4>

                    <form action="{{ route('labels.create') }}" method="POST">
                        @csrf

                        <x-form-field type="text" label="Name" name="name" id="input-name"
                            placeholder="Enter Label Name" />

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Create Label</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
