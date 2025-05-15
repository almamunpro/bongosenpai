
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body>
    @extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Shop Bongosenpai</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-64 object-cover" alt="{{ $product->name }}">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->category }}</p>
                    <p class="text-lg font-semibold mt-2">${{ $product->price }}</p>
                </div>
            </div>
        @empty
            <p>No products available yet.</p>
        @endforelse
    </div>
</div>
@endsection
  </body>
</html>
