<!-- resources/views/payment.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Effectuer un paiement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session()->has('info'))
                        <div class="text-center mb-4">
                            <p class="text-red-500 text-lg font-semibold">
                                {{ session('info') }}
                            </p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('payment.process') }}">
                        @csrf

                        <!-- Montant -->
                        <div class="mt-4">
                            <x-label for="amount" :value="__('Montant')" />
                            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" value="1000" required autofocus />
                        </div>

                        <!-- Devise -->
                        <div class="mt-4">
                            <x-label for="currency" :value="__('Devise')" />
                            <select id="currency" name="currency" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="XOF" selected>XOF</option>
                                <option value="XAF">XAF</option>
                                <option value="CDF">CDF</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="mt-6 text-center">
                            <x-button class="bg-green-500 hover:bg-green-700">
                                {{ __('Effectuer le paiement') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
