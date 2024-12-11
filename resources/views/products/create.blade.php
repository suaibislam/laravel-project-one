<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        /* Editor Container */
        .editor-container {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Toolbar Styles */
        .toolbar {
            margin-bottom: 10px;
        }

        /* Editor Area */
        .editor {
            border: 1px solid #ddd;
            min-height: 150px;
            outline: none;
            padding: 8px;
        }

        /* Formatting Buttons */
        button {
            cursor: pointer;
            margin-right: 5px;
            border: none;
            background: none;
            font-size: 16px;
        }

        /* Submitted HTML Section */
        h3 {
            color: green;
        }

        /* Rendered HTML Section */
        #renderedContent {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
            margin: 10px 0;
            overflow: auto;
        }
    </style>

</head>

<body>



    <!-- <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Laravel CRUD</h3>
    </div> -->
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Create Product</h3>
                    </div>
                    <!-- <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Name</label>
                                <input value="{{ old('name') }}" type="text" class="@error('name') is-invalid @enderror form-control-lg form-control" placeholder="first name" name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Color</label>
                                <input value="{{ old('color') }}" type="text" class="@error('color') is-invalid @enderror form-control form-control-lg" placeholder="last name" name="color">
                                @error('color')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Price</label>
                                <input value="{{ old('price') }}" type="text" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price">
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Description</label>
                                <textarea placeholder="Description" class="form-control" name="description" cols="30" rows="5">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Image</label>
                                <input type="file" class="form-control form-control-lg" placeholder="Price" name="image">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form> -->
                    {!! Form::open(['route' => 'products.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                    <div class="card-body">
                        <div class="mb-3">
                            {!! Form::label('name', 'Name', ['class' => 'form-label h5']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control form-control-lg ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'name']) !!}
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {!! Form::label('color', 'Color', ['class' => 'form-label h5']) !!}
                            {!! Form::text('color', old('color'), ['class' => 'form-control form-control-lg ' . ($errors->has('color') ? 'is-invalid' : ''), 'placeholder' => 'color']) !!}
                            @error('color')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            {!! Form::label('price', 'Price', ['class' => 'form-label h5']) !!}
                            {!! Form::text('price', old('price'), ['class' => 'form-control form-control-lg ' . ($errors->has('price') ? 'is-invalid' : ''), 'placeholder' => 'Price']) !!}
                            @error('price')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>




                        <!-- Toolbar Section -->
                        <div class="toolbar">
                            <button type="button" onclick="document.execCommand('bold')" title="Bold">
                                <i class="fas fa-bold"></i>
                            </button>
                            <button type="button" onclick="document.execCommand('italic')" title="Italic">
                                <i class="fas fa-italic"></i>
                            </button>
                            <button type="button" onclick="document.execCommand('insertUnorderedList')" title="Bullet List">
                                <i class="fas fa-list-ul"></i>
                            </button>
                            <button type="button" onclick="document.execCommand('justifyLeft')" title="Align Left">
                                <i class="fas fa-align-left"></i>
                            </button>
                            <button type="button" onclick="document.execCommand('justifyCenter')" title="Align Center">
                                <i class="fas fa-align-center"></i>
                            </button>
                            <button type="button" onclick="document.execCommand('justifyRight')" title="Align Right">
                                <i class="fas fa-align-right"></i>
                            </button>
                        </div>

                        <!-- Editable Section -->
                        <label for="description">Description</label>
                        <div class="editor-container">
                            <div class="editor @error('description') is-invalid @enderror"
                                id="description"
                                contenteditable="true"
                                placeholder="Type here with allowed HTML tags...">
                                {{ old('description') }}
                            </div>
                        </div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <!-- Hidden Input to Store Raw HTML -->
                        <input type="hidden" name="description" id="descriptionInput">
                        <!-- <div class="mb-3">
            {!! Form::label('description', 'Description', ['class' => 'form-label h5']) !!}
            {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Description', 'cols' => 30, 'rows' => 5]) !!}
        </div> -->

                        <div class="mb-3">
                            {!! Form::label('image', 'Image', ['class' => 'form-label h5']) !!}
                            {!! Form::file('image', ['class' => 'form-control form-control-lg','onchange' => 'previewImage(event)']) !!}
                            <img id="preview" src="" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                            <br>
                        </div>

                        <div class="d-grid">
                            {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>



    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        const form = document.querySelector('form');
        const editor = document.getElementById('description');
        const hiddenInput = document.getElementById('descriptionInput');

        form.addEventListener('submit', function() {
            hiddenInput.value = editor.innerHTML; // Transfer editor content to hidden input
        });
    </script>

    <!-- <script>
        document.querySelector('form').addEventListener('submit', function(e) {
        const editor = document.getElementById('description');
        const descriptionInput = document.getElementById('descriptionInput');
        const content = editor.innerHTML;

        // Disallow <script> tags
        if (/<script.*?>.*?<\/script>/i.test(content)) {
            e.preventDefault(); // Prevent form submission
            alert('Script tags are not allowed in the description.');
            return;
        }

        // Synchronize editor content with hidden input
        descriptionInput.value = content;
       
        });
    </script> -->



</body>

</html>