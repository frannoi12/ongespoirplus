<!-- resources/views/callback.blade.php -->

@if (session('success'))
    <p>{{ session('success') }}</p>
@elseif (session('error'))
    <p>{{ session('error') }}</p>
@endif


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmation de paiement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session()->has('info'))
                        <div class="text-center">
                            <p class="text-xl font-bold text-gray-700">
                                {{ session('info') }}
                            </p>
                        </div>
                    @else
                        <div class="text-center">
                            <p class="text-xl font-bold text-gray-700">
                                Statut du paiement
                            </p>
                            <p class="mt-4 text-gray-500">
                                Aucune information disponible pour le moment.
                            </p>
                        </div>
                    @endif

                    <div class="mt-6 text-center">
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
