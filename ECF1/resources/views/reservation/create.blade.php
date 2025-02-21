<x-layout>
    <x-slot:heading>
        Réserver un cours
    </x-slot:heading>

    <main>
        @if($cours)
            <h1>Réserver le cours : {{ $cours->nom }}</h1>
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label for="creneaux_id">Créneau</label>
                    <select name="creneaux_id" id="creneaux_id" required>
                        @foreach($cours->creneaux as $creneau)
                            <option value="{{ $creneau->id }}">{{ $creneau->formatted_date }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">Réserver</button>
            </form>
        @else
            <p>Cours non trouvé.</p>
        @endif
    </main>
</x-layout>
