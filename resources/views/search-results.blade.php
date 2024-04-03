<x-app-layout>
    <div style="padding-top: 5rem;">
        <x-homepage.top-cards :destinations="$packages" title="Filtered Results" subtitle="Found Destinations" />
    </div>
    @include('components.homepage.footer')
</x-app-layout>