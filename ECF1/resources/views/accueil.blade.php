<x-layout>
    <x-slot:heading>
        Accueil
    </x-slot:heading>

    <main>
        <h1>Liste des activités</h1>
        <ul>
            @foreach ($cours as $cour)

            @endforeach
    </main>
</x-layout>
