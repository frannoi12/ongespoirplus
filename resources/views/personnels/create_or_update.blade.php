<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($personnel) ? __('Modifier Personnel') : __('Ajouter Personnel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form
                        action="{{ isset($personnel) ? route('personnels.update', $personnel->id) : route('personnels.store') }}"
                        method="POST" id="personnel-form">
                        @csrf
                        @if (isset($personnel))
                            @method('PUT')
                        @endif

                        <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information Générale</legend>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="name">Nom</label>
                                <input type="text" id="name" name="name"
                                    value="{{ old('name', $personnel->user->name ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="prenom">Prenom</label>
                                <input type="text" id="prenom" name="prenom"
                                    value="{{ old('prenom', $personnel->user->prenom ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="email">Email</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $personnel->user->email ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="contact">Contact</label>
                                <input type="contact" id="contact" name="contact"
                                    value="{{ old('contact', $personnel->user->contact ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="password">Mot de passe</label>
                                <input type="password" id="password" name="password"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="password_confirmation">Confirmer mot de passe</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>
                        </fieldset>

                        <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                            <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information dans l'Entreprise</legend>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    for="lieu_de_provenance">Provenance</label>
                                <input type="lieu_de_provenance" id="lieu_de_provenance" name="lieu_de_provenance"
                                    value="{{ old('lieu_de_provenance', $personnel->lieu_de_provenance ?? '') }}"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="etat">Etat</label>
                                <select id="etat" name="etat" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option disabled {{ old('etat', $personnel->etat ?? '') == '' ? 'selected' : '' }}>Sélectionnez un état pour se personnel</option>
                                    <option value="actif" {{ old('etat', $personnel->etat ?? '') == 'actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="inactif" {{ old('etat', $personnel->etat ?? '') == 'inactif' ? 'selected' : '' }}>Inactif</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="role">Role</label>
                                <select id="role" name="role" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option disabled {{ old('role', $personnel->role ?? '') == '' ? 'selected' : '' }}>Sélectionnez un rôle pour se personnel</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ old('role', $personnel->role ?? '') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </fieldset>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                                {{ isset($personnel) ? __('Mettre à jour') : __('Ajouter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('personnel-form').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var passwordConfirmation = document.getElementById('password_confirmation').value;
            if (password !== passwordConfirmation) {
                event.preventDefault();
                alert('Les mots de passe ne correspondent pas.');
            }
        });
    </script>
</x-app-layout>
