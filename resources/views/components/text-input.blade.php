<style>
    .rounded-md {
        border-radius: 0.375rem
    }

    /* .border-gray-300 {
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity))
    } */

    /* .shadow-sm {
        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
    }

    .focus\:border-indigo-500:focus {
        --tw-border-opacity: 1;
        border-color: rgb(99 102 241 / var(--tw-border-opacity))
    } */

    /* .focus\:ring-indigo-500:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(99 102 241 / var(--tw-ring-opacity))
    } */

    /* @media (prefers-color-scheme: dark) {
        .dark\:border-gray-700 {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity))
        }

        .dark\:bg-gray-900 {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity))
        }

        .dark\:text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .dark\:focus\:border-indigo-600:focus {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity))
        }

        .dark\:focus\:ring-indigo-600:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(79 70 229 / var(--tw-ring-opacity))
        }
    } */
</style>

@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300
focus:border-indigo-500 focus:ring-indigo-500
rounded-md shadow-sm']) !!}>