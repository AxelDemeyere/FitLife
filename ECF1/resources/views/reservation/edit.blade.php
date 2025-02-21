<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">{{ $cours->nom }}</h3>
                <p class="mb-4">{{ $cours->description }}</p>

                <form method="POST" action="{{ route('reservation.update', $reservation) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Choisir un nouveau créneau
                        </label>
                        <select name="creneaux_id" class="shadow border rounded w-full py-2 px-3">
                            @foreach($creneaux as $creneau)
                                <option value="{{ $creneau->id }}"
                                    {{ $reservation->creneaux_id == $creneau->id ? 'selected' : '' }}>
                                    {{ $creneau->date_heure->format('d/m/Y H:i') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Modifier la réservation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
