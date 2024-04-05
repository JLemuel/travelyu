<x-app-layout>
    <div style="padding-top: 5rem;">
        @if($packages->isNotEmpty() && !$isSuggestion)
        <x-tour-packages :packages="$packages" title="Filtered Results" subtitle="Found Destinations" />
        @elseif($packages->isNotEmpty() && $isSuggestion)
        <div class="mt-5 text-center">
            <h2>No Found Destinations</h2>
            <p>While we couldn't find an exact match for your criteria, here are some suggestions you might like:</p>
        </div>
        <x-tour-packages :packages="$packages" title="Suggestions" subtitle="Suggested Destinations" />
        @else
        <div class="mt-5 text-center pt-5">
            <h2>No Results Found</h2>
            <p>We couldn't find any destinations matching your criteria.</p>
        </div>
        @endif
    </div>
    <x-footer />
</x-app-layout>