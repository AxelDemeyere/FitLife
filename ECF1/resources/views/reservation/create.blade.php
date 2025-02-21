<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Réservation') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if($cours)
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        Réserver le cours : {{ $cours->nom }}
                    </h3>

                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="mb-4">
                            <label for="creneaux_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Sélectionnez un créneau
                            </label>
                            <select name="creneaux_id" id="creneaux_id" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach($cours->creneaux as $creneau)
                                    <option value="{{ $creneau->id }}">
                                        {{ $creneau->formatted_date }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit">
                                {{ __('Réserver') }}
                            </x-primary-button>
                        </div>
                    </form>
                @else
                    <p class="text-gray-500">Cours non trouvé.</p>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
