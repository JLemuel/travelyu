<x-guest-layout>
    <div class="mx-auto">
        <div class="mb-4">
            <nav class="flex flex-col sm:flex-row">
                <button id="defaultTab"
                    class="tablinks text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none"
                    onclick="openTab(event, 'Tourist')">
                    Tourist
                </button>
                <button class="tablinks text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none"
                    onclick="openTab(event, 'TravelAgency')">
                    Travel Agency
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div id="Tourist" class="tab-content">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            :value="old('first_name')" required autofocus />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div>
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                            :value="old('last_name')" required />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    {{--
                    <!-- Birthday -->
                    <div>
                        <x-input-label for="birthday" :value="__('Birthday')" />
                        <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                            :value="old('birthday')" required />
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div> --}}

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <x-input-label for="contact_number" :value="__('Contact Number')" />
                        <x-text-input id="contact_number" class="block mt-1 w-full" type="tel" name="contact_number"
                            :value="old('contact_number')" required />
                        <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                    </div>

                    <!-- Type Field -->
                    <div>
                        <x-input-label for="type" :value="__('I am a')" />
                        <!-- Read-only input field -->
                        <input id="type" name="type" type="text" value="tourist" readonly
                            class="block mt-1 w-full form-input rounded-md shadow-sm bg-gray-200 text-gray-500 cursor-not-allowed"
                            required>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>


                    <!-- Image/File Upload -->
                    <div class="mt-4">
                        <x-input-label for="file" :value="__('File')" />
                        <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" required />
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        <p class="text-xs text-gray-600 mt-1"> <span class="text-red-500">*</span>(Upload valid
                            documents e.g., Birth certificate,
                            Business permit, etc.)</p>
                    </div>

                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register as Tourist') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <div id="TravelAgency" class="tab-content hidden">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <!-- Errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('Name of Agency')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            :value="old('first_name')" required autofocus />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="birthday" :value="__('Date of Establishment')" />
                        <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday"
                            :value="old('birthday')" required />
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <x-input-label for="contact_number" :value="__('Contact Number')" />
                        <x-text-input id="contact_number" class="block mt-1 w-full" type="tel" name="contact_number"
                            :value="old('contact_number')" required />
                        <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                    </div>

                    <!-- Type Field -->
                    <div>
                        <x-input-label for="type" :value="__('I am a')" />
                        <!-- Read-only input field -->
                        <input id="type" name="type" type="text" value="travel_agency" readonly
                            class="block mt-1 w-full form-input rounded-md shadow-sm bg-gray-200 text-gray-500 cursor-not-allowed"
                            required>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>


                    <!-- Image/File Upload -->
                    <div class="mt-4">
                        <x-input-label for="file" :value="__('File')" />
                        <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" required />
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        <p class="text-xs text-gray-600 mt-1"> <span class="text-red-500">*</span>(Upload valid
                            documents e.g., Birth certificate,
                            Business permit, etc.)</p>
                    </div>

                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')" required />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register as Travel Agency') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .tablinks {
            /* Apply default styles here */
        }

        .tablinks.active {
            background-color: #4CAF50;
            /* Green background for active tab */
            color: white;
            /* White text color for active tab */
            border-radius: 5px;
            /* Optional: if you want rounded corners */
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tablinks.active {
            color: #000;
            /* Active tab color */
            border-b-2 border-blue-500;
            /* Active tab bottom border */
        }
    </style>

    <!-- Simple JavaScript function to switch tabs and toggle active class -->
    <script>
        function openTab(evt, tabName) {
            // Get all elements with class="tab-content" and hide them
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        
        // Get the element with id="defaultTab" and click on it to set default tab
        document.getElementById("defaultTab").click();
    </script>
</x-guest-layout>