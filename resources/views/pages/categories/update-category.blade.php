@extends('layout.app')



@section('body-section')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Update Category</h4>


                    <form action="{{ route('category.update',['category' => $category->id ]) }}" method="POST">
                        @csrf

                        <x-form-field type="text" label="Name" name="name" id="input-name" placeholder="Enter Category Name" :value=" $category->name "/>

                        <x-form-field type="submit"    value="Submit" />

                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection
