<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes réservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($reservations->isEmpty())
                        <p class="text-gray-500">{{ __('Vous n\'avez aucune réservation.') }}</p>
                    @else
                        <div class="space-y-4">
                            @foreach($reservations as $reservation)
                                <div class="border p-4 rounded-lg">
                                    <div>
                                        <h3 class="font-semibold text-lg">{{ $reservation->cours->nom }}</h3>
                                        <p class="text-gray-600">{{ $reservation->creneaux->date_heure->format('d/m/Y H:i') }}</p>
                                        <p class="mt-2 text-gray-700">{{ $reservation->cours->description }}</p>
                                    </div>
                                    <div class="mt-4 flex space-x-2">
                                        <a href="{{ route('reservation.edit', ['reservation' => $reservation->id]) }}"
                                           class="text-white bg-blue-600 hover:bg-blue-800 font-bold py-2 px-4 rounded">
                                            Modifier
                                        </a>
                                        <form method="POST" action="{{ route('reservation.destroy', $reservation) }}"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 font-bold py-2 px-4 rounded">
                                                Annuler
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
