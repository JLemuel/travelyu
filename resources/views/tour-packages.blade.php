<x-app-layout>
    <div class="container " style="padding-top: 5rem">
        <x-tour-packages :title="'All Tour Packages'" :subtitle="'Packages'" :packages="$packages" />
    </div>

    @include('components.homepage.footer')
</x-app-layout>