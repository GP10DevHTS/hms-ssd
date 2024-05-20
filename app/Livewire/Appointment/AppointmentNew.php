<?php

namespace App\Livewire\Appointment;

use App\Models\Availability;
use Livewire\Component;

class AppointmentNew extends Component
{
    public $appointment_slot;
    public $bookAppointmentModal_isOpen = false;
    public function mount($appointment_slot){
        $this->appointment_slot = Availability::find($appointment_slot);
        // dd($this->appointment_slot);
        
    }
    public function bookAppointment(){
        $this->bookAppointmentModal_isOpen = true;
    }
    public function render()
    {
        return view('livewire.appointment.appointment-new');
    }
}
