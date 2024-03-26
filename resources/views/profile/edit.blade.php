<style>
    .mx-auto {
        margin-left: auto;
        margin-right: auto
    }

    .-mt-8 {
        margin-top: -2rem
    }

    .max-w-7xl {
        max-width: 80rem
    }

    .max-w-xl {
        max-width: 36rem
    }

    .space-y-6> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
    }

    .bg-white {
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity))
    }

    .p-4 {
        padding: 1rem
    }

    .pb-12 {
        padding-bottom: 3rem
    }

    .text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem
    }

    .font-semibold {
        font-weight: 600
    }

    .leading-tight {
        line-height: 1.25
    }

    .text-gray-800 {
        --tw-text-opacity: 1;
        color: rgb(31 41 55 / var(--tw-text-opacity))
    }

    .shadow {
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
    }

    @media (min-width: 640px) {
        .sm\:rounded-lg {
            border-radius: 0.5rem
        }

        .sm\:p-8 {
            padding: 2rem
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }
    }

    @media (min-width: 1024px) {
        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem
        }
    }

    /* @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity))
        }

        .dark\:text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }
    } */

    /* Green Theme Styles */
    body {
        --tw-bg-opacity: 1;
        background-color: rgb(237, 247, 237 / var(--tw-bg-opacity));
        /* Light green background */
    }

    .bg-green {
        --tw-bg-opacity: 1;
        background-color: rgb(34, 197, 94 / var(--tw-bg-opacity));
        /* Vibrant green */
    }

    .text-green {
        --tw-text-opacity: 1;
        color: rgb(4, 120, 87 / var(--tw-text-opacity));
        /* Dark green text */
    }

    .shadow-green {
        --tw-shadow: 0 4px 6px -1px rgba(5, 150, 105, 0.1), 0 2px 4px -2px rgba(5, 150, 105, 0.1);
    }

    /* Adjusting the nav-tabs to fit the green theme */
    .nav-tabs .nav-link {
        background-color: #10b981;
        color: #065f46;
        border-color: #059669 #059669 #fff;
        /* Green text for tabs */
    }

    .nav-tabs .nav-link.active {
        background-color: #10b981;
        color: white;
        border-color: #059669 #059669 #fff;
    }


    /* Optionally, adjust padding and margins as needed */
</style>
<x-app-layout>
    <div class="container py-5 ">
        <ul class="nav nav-tabs " style="padding-top: 5rem" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="user-bookings-tab" data-bs-toggle="tab" href="#user-bookings" role="tab"
                    aria-controls="user-bookings" aria-selected="true">User Bookings</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="update-profile-tab" data-bs-toggle="tab" href="#update-profile" role="tab"
                    aria-controls="update-profile" aria-selected="false">Update Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="update-password-tab" data-bs-toggle="tab" href="#update-password" role="tab"
                    aria-controls="update-password" aria-selected="false">Update Password</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="delete-user-tab" data-bs-toggle="tab" href="#delete-user" role="tab"
                    aria-controls="delete-user" aria-selected="false">Delete User</a>
            </li>
        </ul>
        <div class="tab-content" id="profileTabsContent">
            <div class="tab-pane fade show active" id="user-bookings" role="tabpanel"
                aria-labelledby="user-bookings-tab" style="margin-top: 1rem;">
                <x-user-bookings />
            </div>
            <div class="tab-pane fade" id="update-profile" role="tabpanel" aria-labelledby="update-profile-tab">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="tab-pane fade" id="update-password" role="tabpanel" aria-labelledby="update-password-tab">
                @include('profile.partials.update-password-form')
            </div>
            <div class="tab-pane fade" id="delete-user" role="tabpanel" aria-labelledby="delete-user-tab">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>