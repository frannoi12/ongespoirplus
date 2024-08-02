<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Informations') }}
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @auth
                            <table class="table-auto w-full">
                                <thead>
                                    {{-- <tr>
                                        <th class="px-4 py-2">Attribut</th>
                                        <th class="px-4 py-2">Valeur</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border px-4 py-2">{{ __('Nom') }}</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Prenom</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Email</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border px-4 py-2">Contact</td>
                                        <td class="border px-4 py-2">{{ Auth::user()->contact }}</td>
                                    </tr>
                                    @if (Auth::user()->personnel->role !== '')
                                        <tr>
                                            <td class="border px-4 py-2">Contact</td>
                                            <td class="border px-4 py-2"></td>
                                        </tr>
                                    @endif
                                    @if (Auth::user()->id === Auth::user()->menage->user_id)
                                        <tr>
                                            <td class="border px-4 py-2">Contact</td>
                                            <td class="border px-4 py-2"></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        @else
                            <p>Vous n'êtes pas connecté.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
