<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product</title>
    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="text-center text-primary mb-4">Edit Product</h3>
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="image">Current Image:</label><br>
                                <img src="{{ asset('storage/' . $product->image) }}" width="100"><br><br>
                                <label for="image">Change Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="price">Price (₹)</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Bootstrap JS (optional, for alerts, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
