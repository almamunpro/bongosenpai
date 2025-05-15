<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="htmlTag">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bongosenpai</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- TailwindCSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] flex p-6 lg:p-8 items-center  min-h-screen flex-col">

        <header class="text-center lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>

            @endif
        </header>
   <section class="relative w-full">
    <!-- Banner Image -->
    <img
        src="{{ asset('images/banner/banner.jpg') }}"
        alt="Banner"
        class="w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] object-cover"
    >

    <!-- Overlay Content -->
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <section class="w-full py-10">
            <div id="image-carousel" class="flex items-center justify-center gap-6 transition-all duration-500">
                <!-- Smaller Left Image -->
                <img id="img-left" src="{{ asset('images/products/kakashi.png') }}"
                    class="w-auto sm:w-44 sm:h-44 md:w-52 md:h-52 object-cover rounded-lg transition-all duration-500" />

                <!-- Larger Center Image -->
                <img id="img-center" src="{{ asset('images/products/Vegeta.png') }}"
                    class="w-60 h-60 sm:w-80 sm:h-80 md:w-[400px] md:h-[400px] object-cover rounded-xl shadow-2xl z-10 transition-all duration-500" />

                <!-- Smaller Right Image -->
                <img id="img-right" src="{{ asset('images/products/Goku 2.png') }}"
                    class="w-auto sm:w-44 sm:h-44 md:w-52 md:h-52 object-cover rounded-lg transition-all duration-500" />
            </div>
        </section>
    </div>
</section>


    </div>
</section>

        @foreach ($products as $product)
    <div class="p-4 bg-white dark:bg-gray-800 shadow rounded mb-4">
        <img src="{{ asset('admin/uploads/' . $product->image_path) }}" alt="{{ $product->title }}" class="w-full h-48 object-cover">
        <h2 class="text-lg font-semibold mt-2">{{ $product->title }}</h2>
        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $product->category }}</p>
        <p class="text-sm mt-1">Stock: {{ $product->stock }}</p>

        @auth
            <a href="{{ route('add.to.cart', $product->id) }}" class="mt-2 inline-block px-4 py-1 text-white bg-blue-600 rounded">Add to Cart</a>
        @else
            <a href="{{ route('login') }}" class="mt-2 inline-block px-4 py-1 text-white bg-gray-600 rounded">Login to Rent</a>
        @endauth
    </div>
    @endforeach

    </body>

<script>
    const images = [
        "{{ asset('images/products/kakashi.png') }}",
        "{{ asset('images/products/Vegeta.png') }}",
        "{{ asset('images/products/Goku 2.png') }}"
    ];

    let currentIndex = 0;

    const imgLeft = document.getElementById("img-left");
    const imgCenter = document.getElementById("img-center");
    const imgRight = document.getElementById("img-right");

    function rotateImages() {
        currentIndex = (currentIndex + 1) % images.length;

        imgLeft.src = images[(currentIndex + 2) % 3];
        imgCenter.src = images[currentIndex];
        imgRight.src = images[(currentIndex + 1) % 3];
    }

    setInterval(rotateImages, 1500); // rotates every 1.5s
</script>

</html>
