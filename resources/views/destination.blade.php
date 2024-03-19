<x-app-layout>

    <div style="padding-top: 5rem">
        <x-homepage.top-cards :destinations="$destinations" title="All Destinations" subtitle="Destination" />
    </div>

    {{--
    <x-homepage.top-cards :destinations="$activities" title="Popular Activities" subtitle="Activities" /> --}}

    {{-- @include('components.homepage.services') --}}

    @include('components.homepage.footer')
</x-app-layout>