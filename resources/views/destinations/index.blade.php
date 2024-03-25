<x-app-layout>

    {{-- Inside resources/views/destinations/index.blade.php
    <h1>Destinations in {{ $cityName }}</h1>
    @foreach ($destinations as $destination)

    <div>{{ $destination->name }}</div>

    <div style="padding-top: 5rem">
        <x-homepage.top-cards :destinations="$packages" title="All Tour Packages" subtitle="Packages" />
    </div>

    @endforeach --}}

    <div class="container" style="padding-top: 5rem">
        <h1 class="mt-5">Destinations in {{ $cityName }}</h1>
        <x-homepage.top-cards :destinations="$destinations" title="All Tour Packages" subtitle="Packages" />
    </div>


    @include('components.homepage.footer')
</x-app-layout>