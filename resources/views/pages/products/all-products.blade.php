@extends('layout.app')



@section('body-section')
    <!-- start page title -->
    <div class="row">

        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Products</h4>
            </div>
        </div>

    </div>

    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">

                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Name</th>
				<th>Status</th>
                                <th>Category</th>
                                <th>Image</th>
                                {{-- <th>
                                    Actions
                                </th> --}}
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
				    <td>{{ $product->status }}</td>

                                    <td>
                                        <img src="{{ $product->images[0]->image_path }}" 
                                            alt="" class="img-fluid" 
                                            style="width: 100px; height: 100px;">
                                        
                                    </td>

                                    {{-- <td>
                                        <a href="{{ route('category.update', ['category' => $cat->id]) }}"
                                            class="btn btn-success">
                                            Edit
                                        </a>
                                        <x-post-button url="{{ route('category.delete', ['category' => $cat->id]) }}"
                                            value="Delete" />
                                    </td> --}}

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
