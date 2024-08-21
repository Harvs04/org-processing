<!doctype html>
<html lang="en">
<head>
    <!-- Meta tags for character set, viewport settings, and compatibility -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title of the document -->
    <title>Document</title>

    <!-- Link to Tailwind CSS for styling -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Livewire styles for Livewire components -->
    @livewireStyles
</head>
<body>
<!-- JavaScript libraries and scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"></script>
<script src="{{ asset('js/admin_layout_script.js') }}"></script>

<!-- Main container with full width and height, and gray background -->
<div class="w-screen h-screen bg-gray-200">
    <div class="w-full h-full flex flex-no-wrap">
        <!-- Livewire sidebar component -->
        <div class="hidden lg:block">
            <livewire:layout.sidebar />
        </div>

        <!-- Mobile responsive sidebar -->
        <div class="absolute w-full h-full z-40 transform -translate-x-full lg:hidden bg-black bg-opacity-60" id="mobile-nav">
            <livewire:layout.sidebar />
        </div>

        <!-- Main content area with full width -->
        <div class="w-full h-full flex flex-col overflow-hidden">
            <!-- Livewire navbar component -->
            <livewire:layout.navbar />

            <!-- Content section -->
            <div class="w-full flex-grow overflow-auto py-4">
                <!-- Placeholder for content to be inserted by child views -->
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Livewire scripts for Livewire components -->
@livewireScripts
</body>
</html>
