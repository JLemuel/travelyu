<style>
    .block {
        display: block
    }

    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem
    }

    .font-medium {
        font-weight: 500
    }

    .text-gray-700 {
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity))
    }

    /* @media (prefers-color-scheme: dark) {
        .dark\:text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }
    } */
</style>
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>