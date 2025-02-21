
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes réservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($reservations->isEmpty())
                        <p class="text-gray-500">{{ __('Vous n\'avez aucune réservation.') }}</p>
            @else
                <div class="space-y-4">
                    @foreach($reservations as $reservation)
                        <div class="border p-4 rounded-lg">
                            <h3 class="font-semibold text-lg">{{ $reservation->cours->nom }}</h3>
                            <div class="mt-2 text-gray-600">
                                <p>Date : {{ $reservation->creneaux->formatted_date }}</p>
                                <p class="mt-1">{{ $reservation->cours->description }}</p>
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
