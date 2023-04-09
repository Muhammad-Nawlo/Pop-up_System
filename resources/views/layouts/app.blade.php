<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')

<!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
@endif

<!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>


{{--render popups that belongs to a page--}}
<script type="module">
    const displayPopup = (index) => {
        var popups = {!! json_encode(session('popups')) !!};
        if (index < popups.length) {
            var popup = popups[index];

            //calculate the total delay for next popup
            let delay = index !== 0 ? popups[index - 1].config.delay : 0;
            setTimeout(() => {
                new Swal({
                    title: popup.name,
                    text: popup.content,
                    icon: popup.config.status,
                    ...popup.config
                }).then(function () {
                    displayPopup(index + 1);
                });
            }, popup.config.delay - delay)
        }
    }
    displayPopup(0);
</script>
</body>
</html>
