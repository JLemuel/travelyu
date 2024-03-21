<x-app-layout>

    <div style="padding-top: 5rem">
        <x-homepage.top-cards :destinations="$destinations" title="All Destinations" subtitle="Destination" />
    </div>

    @include('components.homepage.footer')
</x-app-layout>