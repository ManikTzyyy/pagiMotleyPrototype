<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery for loading indicator -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .loading {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }

        .loader {
            width: 50px;
            aspect-ratio: 1;
            border-radius: 50%;
            background:
                radial-gradient(farthest-side, #ffa516 94%, #0000) top/8px 8px no-repeat,
                conic-gradient(#0000 30%, #ffa516);
            -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 8px), #000 0);
            animation: l13 1s infinite linear;
        }

        @keyframes l13 {
            100% {
                transform: rotate(1turn)
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Add New Product</h2>
        <form action="./api/add.php" method="post" enctype="multipart/form-data" id="productForm">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" class="form-control" id="product_desc" name="product_desc" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="top">Top</option>
                    <option value="head">Head</option>
                    <option value="bottom">Bottom</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="img" name="img" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <!-- Loading Indicator -->
    <div class="loading">
        <div class="loader"></div>
    </div>

    <script>
        // Show loading indicator on form submit
        $('#productForm').on('submit', function () {
            $('.loading').show();
        });
    </script>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>