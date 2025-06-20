@extends('layout.app')



@section('body-section')
    <!-- start page title -->
    <div class="row">

        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Labels</h4>
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

                                    <th scope="col"> Id</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col"> Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($labels as $label)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $label->name }}</td>

                                        <td>
                                            <a href="{{ route('labels.update', ['label' => $label->id]) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>


                                            @php
                                                $url = route('labels.delete', ['label' => $label->id]);
                                            @endphp

                                            <a href="#" class="btn btn-danger"
                                                onclick="showDeleteModal('{{ $url }}')">
                                                <i class="fas fa-trash-alt"></i> </a>

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
