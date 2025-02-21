<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Les cours</h2>
    </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($cours as $coursItem)
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                                    <div class="p-6">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                            {{ $coursItem->nom }}
                                        </h3>
                                        <p class="text-gray-600 mb-4">
                                            {{ $coursItem->description }}
                                        </p>
                                        <div class="mt-4">
                                            <a href="{{ route('reservation.create', $coursItem) }}"
                                               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Réserver
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
