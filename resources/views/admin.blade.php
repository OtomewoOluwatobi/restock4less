<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Form fields -->
                            <div class="form-group my-2">
                                <label for="product_name">Product Name:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="image_url">Image:</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="discription">Description:</label>
                                <textarea id="discription" class="form-control" name="discription" required></textarea>
                            </div>

                            <button type="submit" name=submit class="btn btn-success">Create Product</button>
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
                                    <th>Discription</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="records-table">
                                <!-- Records will be displayed here -->
                                @foreach ($allProduct as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('path/to/image/' . $product->image_url) }}"
                                                alt="Product Image"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->discription }}</td>
                                        <td>
                                            <!-- Actions buttons (e.g. edit, delete) -->
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
