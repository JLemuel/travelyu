<style>
    .inline-flex {
        display: inline-flex
    }

    .items-center {
        align-items: center
    }

    .rounded-md {
        border-radius: 0.375rem
    }

    .border {
        border-width: 1px
    }

    .border-transparent {
        border-color: transparent
    }

    .bg-red-600 {
        --tw-bg-opacity: 1;
        background-color: rgb(220 38 38 / var(--tw-bg-opacity))
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem
    }

    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem
    }

    .text-xs {
        font-size: 0.75rem;
        line-height: 1rem
    }

    .font-semibold {
        font-weight: 600
    }

    .uppercase {
        text-transform: uppercase
    }

    .tracking-widest {
        letter-spacing: 0.1em
    }

    .text-white {
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity))
    }

    .transition {
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms
    }

    .duration-150 {
        transition-duration: 150ms
    }

    .ease-in-out {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1)
    }

    .hover\:bg-red-500:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(239 68 68 / var(--tw-bg-opacity))
    }

    .focus\:outline-none:focus {
        outline: 2px solid transparent;
        outline-offset: 2px
    }

    .focus\:ring-2:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
    }

    .focus\:ring-red-500:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(239 68 68 / var(--tw-ring-opacity))
    }

    .focus\:ring-offset-2:focus {
        --tw-ring-offset-width: 2px
    }

    .active\:bg-red-700:active {
        --tw-bg-opacity: 1;
        background-color: rgb(185 28 28 / var(--tw-bg-opacity))
    }

    @media (prefers-color-scheme: dark) {
        .dark\:focus\:ring-offset-gray-800:focus {
            --tw-ring-offset-color: #1f2937
        }
    }
</style>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 border
    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500
    active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2
    dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>