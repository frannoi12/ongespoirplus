<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails du Personnel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information Générale
                        </legend>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                            <p>{{ $personnel->user->name }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prenom</label>
                            <p>{{ $personnel->user->prenom }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <p>{{ $personnel->user->email }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact</label>
                            <p>{{ $personnel->user->contact }}</p>
                        </div>
                    </fieldset>

                    <fieldset class="mb-6 border border-gray-300 p-4 rounded-md">
                        <legend class="text-lg font-medium text-gray-700 dark:text-gray-300">Information dans
                            l'Entreprise</legend>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provenance</label>
                            <p>{{ $personnel->lieu_de_provenance }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Etat</label>
                            <p>{{ $personnel->etat }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                            <p>{{ $personnel->role }}</p>
                        </div>
                    </fieldset>

                    @can('personnel_update')
                        <div class="flex justify-end">
                            <a href="{{ route('personnels.edit', $personnel->id) }}"
                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                                Modifier
                            </a>
                        </div>
                    @endcan
                    <div class="flex justify-begin">
                        <a href="{{ route('personnels.index', $personnel->id) }}"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                            Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
