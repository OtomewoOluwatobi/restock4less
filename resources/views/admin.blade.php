<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing_page/images/200.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Add New Item</h5>
                        <!-- Assuming you're using Laravel's Blade templating engine -->
                        <form method="POST"
                            action="{{ isset($product) ? route('products.update', ['id' => $product->id]) : route('products.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Product Name -->
                            <div class="form-group my-2">
                                <label for="product_name">Product Name:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ $product->name ?? '' }}" required />
                                @if ($errors->has('product_name'))
                                    <span class="error">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>

                            <!-- Price -->
                            <div class="form-group my-2">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $product->price ?? '' }}" required>
                                @if ($errors->has('price'))
                                    <span class="error">{{ $errors->first('price') }}</span>
                                @endif
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group my-2">
                                <label for="image_url">Image:</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" required>
                                @if ($errors->has('image_url'))
                                    <span class="error">{{ $errors->first('image_url') }}</span>
                                @endif
                                @if (!empty($product))
                                    <img src="{{ Storage::url($product->image_url) }}" alt="Product Image"
                                        style="width: 40px; height: 50px;">
                                @endif
                            </div>

                            <!-- Description -->
                            <div class="form-group my-2">
                                <label for="description">Description:</label>
                                <textarea id="description" class="form-control" name="description" required>{{ $product->description ?? '' }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="error">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="btn btn-success">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
                            <div>
                                @if (isset($product))
                                    <a href="{{ route('admin') }}">Create New</a>
                                @endif
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Records</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="records-table">
                                <!-- Records will be displayed here -->
                                @foreach ($allProduct as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <a href="{{ Storage::url($product->image_url) }}">
                                                <img src="{{ Storage::url($product->image_url) }}" alt="Product Image"
                                                    style="width: 40px; height: 50px;" />
                                            </a>
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ Str::substr($product->description, 0, 35) }} ...</td>
                                        <td class="text-left">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('products.activate', ['id' => $product->id]) }}"
                                                    class="btn btn-success"
                                                    {{ $product->is_hidden ? '' : 'disabled' }}>Activate</a>
                                                <a href="{{ route('products.deactivate', ['id' => $product->id]) }}"
                                                    class="btn btn-warning"
                                                    {{ $product->is_hidden ? 'disabled' : '' }}>Deactivate</a>
                                            </div>
                                            <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                                class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $allProduct->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
