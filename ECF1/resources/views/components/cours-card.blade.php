@props(['cours'])

<div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800">{{ $cours->nom }}</h2>
    <p class="text-gray-600 mt-2">{{ $cours->description }}</p>
    <a href="{{ route('reservation.create', $cours->id) }}"
       class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
        Réserver
    </a>
</div>
