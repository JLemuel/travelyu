<x-app-layout>

    <x-tour-packages :packages="$destinations" title="Popular Destinations" subtitle="Destination" />

    <x-tour-packages :packages="$activities" title="Popular Activities" subtitle="Activities" />

    @include('components.homepage.services')

    @include('components.homepage.footer')
</x-app-layout>