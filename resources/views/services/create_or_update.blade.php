<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $service->exists ? __('Modifier Service') : __('Créer Service') }}
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
                <form action="{{ $service->exists ? route('services.update', $service->id) : route('services.store') }}" method="POST">
                    @csrf
                    @if($service->exists)
                        @method('PUT')
                    @endif

                    <div class="p-6 space-y-6">
                        <div>
                            <label for="code_service" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Code du Service</label>
                            <input type="text" name="code_service" id="code_service" class="mt-1 block w-full" value="{{ old('code_service', $service->code_service) }}">
                        </div>
                        <div>
                            <label for="type_service" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type de Service</label>
                            <input type="text" name="type_service" id="type_service" class="mt-1 block w-full" value="{{ old('type_service', $service->type_service) }}">
                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500">
                            {{ $service->exists ? 'Modifier' : 'Créer' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
