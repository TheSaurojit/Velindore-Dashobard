@extends('layout.app')



@section('body-section')
    <!-- start page title -->
    <div class="row">

        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Orders</h4>
            </div>
        </div>

    </div>

    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-striped table-borderless table-centered">
                            <thead class="table-light">
                                <tr>


                                    <th scope="col">Order Id</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Image</th>

                                    <th scope="col">Shipping Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->product->name }}</td>

                                        <td>
                                            <img src="{{ $order->product->images[0]->image_path }}" alt=""
                                                class="img-fluid" style="width: 100px; height: 100px;">
                                        </td>

                                        <td>
                                            {{ $order->status }}
                                        </td>

                                    </tr>
                                @endforeach

                               

                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
