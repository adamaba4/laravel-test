<?php


namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Livewire\Component;

class BookingManager extends Component
{
    public $property_id = '';
    public $start_date = '';
    public $end_date = '';

    protected $rules = [
        'property_id' => 'required|exists:properties,id',
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after:start_date',
    ];

    public function book()
    {
        $this->validate();

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $this->reset(['property_id', 'start_date', 'end_date']);
        $this->dispatch('booking-created');
        session()->flash('message', 'Réservation créée avec succès !');
    }

    public function deleteBooking(int $id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->user_id === auth()->id()) {
            $booking->delete();
            session()->flash('message', 'Réservation supprimée !');
        }
    }

    public function render()
    {
        return view('livewire.booking-manager', [
            'properties' => Property::all(),
            'bookings' => Booking::where('user_id', auth()->id())
                ->with('property')
                ->latest()
                ->get(),
        ]);
    }
}
