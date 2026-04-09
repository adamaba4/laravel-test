<div>
    @if (session()->has('message'))
    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
        {{ session('message') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-bold mb-4">Nouvelle réservation</h2>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Propriété</label>
            <select wire:model="property_id" class="w-full border border-gray-300 rounded-lg p-2">
                <option value="">-- Choisir une propriété --</option>
                @foreach($properties as $property)
                <option value="{{ $property->id }}">
                    {{ $property->name }} — {{ $property->price_per_night }}€/nuit
                </option>
                @endforeach
            </select>
            @error('property_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Date d'arrivée</label>
            <input type="date" wire:model="start_date" class="w-full border border-gray-300 rounded-lg p-2">
            @error('start_date')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Date de départ</label>
            <input type="date" wire:model="end_date" class="w-full border border-gray-300 rounded-lg p-2">
            @error('end_date')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button wire:click="book" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            Réserver
        </button>
        <span wire:loading class="text-gray-500 ml-2">Traitement en cours...</span>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4">Mes réservations</h2>

        @forelse($bookings as $booking)
        <div class="flex items-center justify-between border-b py-3">
            <div>
                <p class="font-semibold">{{ $booking->property->name }}</p>
                <p class="text-gray-500 text-sm">
                    Du {{ $booking->start_date->format('d/m/Y') }}
                    au {{ $booking->end_date->format('d/m/Y') }}
                </p>
            </div>
            <button wire:click="deleteBooking({{ $booking->id }})"
                    wire:confirm="Supprimer cette réservation ?"
                    class="text-red-500 hover:text-red-700">
                Supprimer
            </button>
        </div>
        @empty
        <p class="text-gray-500">Aucune réservation pour le moment.</p>
        @endforelse
    </div>
</div>
