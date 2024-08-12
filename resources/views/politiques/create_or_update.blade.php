<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($politique) ? __('Modifier la Politique') : __('Créer une Politique') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST"
                      action="{{isset($politique) ? route('politiques.update', $politique->id) : route('politiques.store') }}">
                    @csrf
                    @if(isset($politique))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 dark:text-gray-200">Description</label>
                        <textarea id="description" name="description"
                                  class="w-full rounded-md border border-gray-300">{{ old('description', $politique->description ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="personnel_id" class="block text-gray-700 dark:text-gray-200">Personnel</label>
                        <select id="personnel_id" name="personnel_id" class="w-full rounded-md border border-gray-300">
                            @foreach($personnels as $personnel)
                                <option value="{{ $personnel->id }}"
                                    {{ old('personnel_id', $politique->personnel_id ?? '') == $personnel->id ? 'selected' : '' }}>
                                    {{ $personnel->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white text-sm px-4 py-2 rounded-md">
                            {{ isset($politique) ? __('Mettre à jour') : __('Ajouter') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
