@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Our Products</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="border p-4 rounded shadow">
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-48 object-cover mb-3">
            @endif
            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
            <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
            <p class="text-sm text-gray-500 mt-1">{{ $product->category }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
