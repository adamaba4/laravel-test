
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold text-primary mb-6">Nos propriétés</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($properties as $property)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $property->name }}</h2>
                    <p class="text-gray-600 mb-4"> {{ $property->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-primary">{{ $property->price_per_night }} € / nuit</span>
                        <a href="{{ route('bookings') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700">Réserver</a>
                    </div>
                </div>
            @endforeach
        </div>

        @if($properties->isEmpty())
            <p class="text-gray-500 text-center mt-10">Aucune propriété disponible pour le moment.</p>
        @endif
    </div>
</x-app-layout>


