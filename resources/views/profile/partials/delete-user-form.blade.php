<style>
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0
    }

    .ms-3 {
        margin-inline-start: 0.75rem
    }

    .mt-1 {
        margin-top: 0.25rem
    }

    .mt-2 {
        margin-top: 0.5rem
    }

    .mt-6 {
        margin-top: 1.5rem
    }

    .block {
        display: block
    }

    .flex {
        display: flex
    }

    .w-3\/4 {
        width: 75%
    }

    .justify-end {
        justify-content: flex-end
    }

    .space-y-6> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.5rem * var(--tw-space-y-reverse))
    }

    .p-6 {
        padding: 1.5rem
    }

    .text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem
    }

    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem
    }

    .font-medium {
        font-weight: 500
    }
</style>
<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium " style="color: green; margin-top: 1rem">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before
            deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete
        Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please
                enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>