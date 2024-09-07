<x-guest-layout>
    <!-- Ajout de l'image de fond avec Tailwind CSS -->
<<<<<<< HEAD


    <form method="POST" action="{{ route('register') }}" id="menage-form">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Prenom -->
        <div>
            <x-input-label for="Prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')"
                required autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>
=======
    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center" style="background-image: url('{{ asset('images/cut-xl.jpg') }}');">
    
        <form method="POST" action="{{ route('register') }}" class="bg-white dark:bg-gray-800 bg-opacity-75 p-6 rounded-lg shadow-lg w-full max-w-md">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Prenom -->
            <div>
                <x-input-label for="Prenom" :value="__('Prenom')" />
                <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>
>>>>>>> 4552cd5 (login et register)

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

<<<<<<< HEAD
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contact -->
        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" oninput="validateContact()" class="block mt-1 w-full" type="tel"
                name="contact" :value="old('contact')" required autocomplete="contact" oninput="validateContact()"/>
            <span id="contactError" class="text-red-500 text-sm mt-2"></span> <!-- Élement pour afficher les erreurs -->
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
=======
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
>>>>>>> 4552cd5 (login et register)

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

<<<<<<< HEAD
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information d'un ménage
            </legend> --}}

        <div class="mt-4">
            <x-input-label for="service_id" :value="__('Organisme')" />
            <select id="service_id" name="service_id"
                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option disabled {{ !isset($menage) || !isset($menage->service_id) ? 'selected' : '' }}>
                    Sélectionnez un organisme</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}"
                        {{ isset($menage) && $menage->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->type_service }}</option>
                @endforeach
            </select>
            @error('service_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <x-input-label for="secteur_id" :value="__('Secteur')" />
            <select id="secteur_id" name="secteur_id"
                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option disabled {{ !isset($menage) || !isset($menage->secteur_id) ? 'selected' : '' }}>
                    Sélectionnez votre secteur</option>
                @foreach ($secteurs as $secteur)
                    <option value="{{ $secteur->id }}"
                        {{ isset($menage) && $menage->secteur_id == $secteur->id ? 'selected' : '' }}>
                        {{ $secteur->nomSecteur }}</option>
                @endforeach
            </select>
            @error('secteur_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <x-input-label for="tariff_id" :value="__('Tariff')" />
            <select id="tariff_id" name="tariff_id"
                class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <option disabled {{ !isset($menage) || !isset($menage->tariff_id) ? 'selected' : '' }}>
                    Sélectionnez votre tarif</option>
                @foreach ($tariffs as $tariff)
                    <option value="{{ $tariff->id }}"
                        {{ isset($menage) && $menage->tariff_id == $tariff->id ? 'selected' : '' }}>
                        {{ $tariff->montant . '  ' . $tariff->designation }}</option>
                @endforeach
            </select>
            @error('tariff_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        @php
            // Décoder la localisation si elle est disponible
            $localisation = isset($menage->localisation) ? json_decode($menage->localisation, true) : null;
            $latitude = old('latitude', $localisation['latitude'] ?? 8.990347);
            $longitude = old('longitude', $localisation['longitude'] ?? 1.130433);
        @endphp

        <div class="mt-4" id="map">
            <x-maps-leaflet :centerPoint="[
                'lat' => $latitude,
                'lng' => $longitude,
            ]" :zoom="14" style="width: 100%; height: 400px;">
            </x-maps-leaflet>

            <input type="hidden" id="longitude" name="longitude" value="{{ $longitude }}">
            <input type="hidden" id="latitude" name="latitude" value="{{ $latitude }}">

            @error('longitude')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            @error('latitude')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>



        <!-- Politique de confidentialité -->
        <div class="mt-4">
            <x-input-label for="politique" :value="__('Politique de Confidentialité')" />
            <div
                class="max-h-96 overflow-y-auto p-4 border rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                <!-- Contenu des politiques de confidentialité -->
                @foreach ($politiques as $politique)
                    <div class="mb-4">
                        <p class="font-medium">{{ $politique->titre }}</p>
                        <p>{{ $politique->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-4">
            <x-input-label for="politique_acceptance" :value="__('Acceptez-vous les politiques de confidentialité ?')" />
            <div class="flex items-center">
                <input type="checkbox" id="politique_acceptance" name="politique_acceptance" value="1"
                    {{ old('politique_acceptance', isset($menage) && $menage->politique ? 'checked' : '') }}
                    class="mr-2">
                <label for="politique_acceptance"
                    class="text-gray-700 dark:text-gray-300">{{ __('Oui, j\'ai lu et j\'accepte les politiques de confidentialité') }}</label>
            </div>
            @error('politique_acceptance')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- </fieldset> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button id="submit-button" class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
=======
    </div>
>>>>>>> 4552cd5 (login et register)
</x-guest-layout>
