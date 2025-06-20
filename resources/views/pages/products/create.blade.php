@extends('layout.app')


@section('body-section')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create Product</h4>

                

                    <form action="{{ route('products.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <x-form-field type="text" label="name" name="name" id="input-name" placeholder="enter name" />

                        <x-form-field type="text" label="description" name="description" id="input-description"
                            placeholder="enter description" />

                        <x-form-field type="select" label="category" name="category" id="input-category" :options="$categories"
                            placeholder="choose category" />

                            
                        <x-form-field type="select" label="label" name="label" id="input-label" :options="$labels"
                            placeholder="choose label" />

                        <x-form-field type="select" label="status" name="status" id="input-status" 
                            :options="['active', 'inactive']"
                            :matchOnKey="false"
                            placeholder="enter status" />

                        <x-form-field type="number" label="price" name="price" id="input-price" placeholder="enter price" />

                        <x-form-field type="number" label="quantity" name="quantity" id="input-quantity" placeholder="enter quantity" />



                        {{-- images start --}}
                        <div class="mb-3" style="padding: 10px 0">
                            <label for="images" class="form-label"> Images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple
                                accept="image/*">
                        </div>
                        <div class="row" id="preview-container"></div>

                        {{-- images end --}}


                        <div class="mb-3" style="padding: 10px 0">
                            <label for="three_d_image" class="form-label">3D Image</label>
                            <input type="file" name="three_d_image" id="three_d_image" class="form-control">
                        </div>



                        <x-form-field type="submit" value="Submit" />

                    </form>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection


@section('script-section')
    {{-- images script section --}}

    <script>
        const input = document.getElementById('images');
        const previewContainer = document.getElementById('preview-container');
        let fileList = new DataTransfer();

        input.addEventListener('change', (e) => {
            Array.from(input.files).forEach(file => {
                // Prevent duplicates by checking name + size
                if (![...fileList.files].some(f => f.name === file.name && f.size === file.size)) {
                    fileList.items.add(file);

                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const col = document.createElement('div');
                        col.className = 'col-md-3 mb-3';
                        col.innerHTML = `
                        <div class="card">
                            <img src="${event.target.result}" class="card-img-top" style="height:150px; object-fit:cover;">
                            <div class="card-body p-2 text-center">
                                <button type="button" class="btn btn-sm btn-danger remove-image" data-name="${file.name}" data-size="${file.size}">Remove</button>
                            </div>
                        </div>
                    `;
                        previewContainer.appendChild(col);
                    };
                    reader.readAsDataURL(file);
                }
            });


            // Set the updated file list back to the input
            input.files = fileList.files;
            // input.value = ""; // Clear input so same file can be re-selected if needed


        });



        // Remove button logic
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-image')) {
                const name = e.target.getAttribute('data-name');
                const size = e.target.getAttribute('data-size');
                const newFileList = new DataTransfer();

                Array.from(fileList.files).forEach(file => {
                    if (!(file.name === name && file.size == size)) {
                        newFileList.items.add(file);
                    }
                });

                fileList = newFileList;
                input.files = fileList.files;

                e.target.closest('.col-md-3').remove();

            }
        });
    </script>


@endsection
