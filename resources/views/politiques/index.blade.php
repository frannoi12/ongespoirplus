<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Politiques') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Liste des politiques') }}
                </div>
                <div>
                    <a href="{{ route('politiques.create') }}">
                        <button style="background: green"
                            class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">
                            Ajouter
                        </button>
                    </a>
                </div>
            </div>
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 w-full space-y-6">
                    <div class="w-full">
                        <form action="{{ route('politiques.index') }}" method="get">
                            <input type="text" name="search" placeholder="Rechercher"
                                class="w-2/3 rounded-md border border-gray-300">
                            <button class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md"
                                style="background:green ">
                                Rechercher
                            </button>
                        </form>
                    </div>
                    <table class="w-full text-left">
                        <thead class="text-lg font-semibold bg-gray-300">
                            <th class="py-3 px-6">Description</th>
                            <th class="py-3 px-6">Personnel</th>
                            <th class="py-3 px-6">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($politiques as $politique)
                                <tr class="bg-gray-100">
                                    <td class="py-3 px-6">
                                        {{ $politique->description }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $politique->personnel->user->name ?? ''}}
                                    </td>
                                    <td class="py-3 px-6">
                                        <a href="{{ route('politiques.edit', $politique->id) }}">
                                            <button
                                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                        </a>
                                        <a href="{{ route('politiques.show', $politique->id) }}">
                                            @csrf
                                            <button
                                                class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                        </a>
                                        <form action="{{ route('politiques.destroy', $politique->id) }}" method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette politique ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                Aucune politique disponible
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $politiques->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>