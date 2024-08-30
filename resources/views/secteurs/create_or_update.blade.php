<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($secteur) ? __('Modifier Secteur') : __('Créer Secteur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ isset($secteur) ? route('secteurs.update', $secteur->id) : route('secteurs.store') }}" method="POST">
                    @csrf
                    @if(isset($secteur))
                        @method('PUT')
                    @endif

                    <div class="p-6 space-y-6">
                        <div>
                            <label for="nomSecteur" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom du Secteur</label>
                            <input type="text" name="nomSecteur" id="nomSecteur" class="mt-1 block w-full" value="{{ old('nomSecteur', $secteur->nomSecteur ?? '') }}" required>
                        </div>
                    </div>

                    <div class="px-4 py-3 text-right flex justify-center sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500">
                            {{ isset($secteur) ? 'Modifier' : 'Créer' }}
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
