<x-layout>
    <x-slot:heading>Cours</x-slot:heading>

    <div class="content-wrapper">
        @foreach($cours as $coursItem)
            <x-course-card :cours="$coursItem" />
        @endforeach
    </div>
</x-layout>
