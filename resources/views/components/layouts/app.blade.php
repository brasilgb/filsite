<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Site' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body
      x-data="{navOpen: false, scrolledFromTop: false}"
      x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
      @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
      :class="{
      'overflow-hidden': navOpen,
      'overflow-scroll': !navOpen
      }"
   >
    <div class="min-h-screen flex flex-col">
        @livewire('partials.navbar')
        <main class="flex-grow">
            {{ $slot }}
        </main>
        @livewire('partials.footer')
    </div>
    @livewireScripts
</body>

</html>
