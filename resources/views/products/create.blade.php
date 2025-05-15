<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Add New Product</h2>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="block">Name</label>
            <input name="name" type="text" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border p-2"></textarea>
        </div>

        <div class="mb-3">
            <label class="block">Price ($)</label>
            <input name="price" type="number" step="0.01" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label class="block">Category</label>
            <input name="category" type="text" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label class="block">Stock Quantity</label>
            <input name="stock_quantity" type="number" class="w-full border p-2" required>
        </div>

        <div class="mb-3">
            <label class="block">Image</label>
            <input name="image" type="file" class="w-full border p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Product</button>
    </form>
</div>
@endsection

</body>
</html>
