<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Personnel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div
                class="bg-white flex items-center justify-between mx-6 px-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Liste des personnels') }}
                </div>
                <div>
                    <a href="{{ route('personnels.create') }}">
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
                        <form action="{{ route('personnels.index') }}" method="get">
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
                            <th class="py-3 px-6">Nom</th>
                            <th class="py-3 px-6">Prenom</th>
                            <th class="py-3 px-6">Email</th>
                            <th class="py-3 px-6">Contact</th>
                            <th class="py-3 px-6">Etat</th>
                            <th class="py-3 px-6">Role</th>
                            <th class="py-3 px-6">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($personnels as $personnel)
                                <tr class="bg-gray-100">
                                    <td class="py-3 px-6">
                                        {{ $personnel->user->name }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $personnel->user->prenom }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $personnel->user->email }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $personnel->user->contact }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $personnel->etat }}
                                    </td>
                                    <td class="py-3 px-6">
                                        {{ $personnel->role }}
                                    </td>
                                    <td class="py-3 px-6">
                                        <a href="{{ route('personnels.edit', $personnel->id) }}">
                                            <button
                                                class="bg-blue-600 hover:bg-blue-500 text-white text-sm px-3 py-2 rounded-md">Editer</button>
                                        </a>
                                        <a href="{{ route('personnels.show', $personnel->id) }}">
                                            @csrf
                                            <button
                                                class="bg-yellow-600 hover:bg-yellow-500 text-white text-sm px-3 py-2 rounded-md">Consulter</button>
                                        </a>
                                        <form action="{{ route('personnels.destroy', $personnel->id) }}" method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-600 hover:bg-red-500 text-white text-sm px-3 py-2 rounded-md">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                Aucun produit disponible
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $personnels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
