<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Treatment;
use App\Models\User;

class Treatments extends Component
{
    public $patientId;
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    public function mount($user)
    {
        $this->patientId = User::find($user)->id;
    }

    public function saveTreatment()
    {
        $this->validate();

        Treatment::create([
            'patient_id' => $this->patientId,
            'name' => $this->name,
            'description' => $this->description,
            'treatment_date' => now(),
        ]);

        $this->resetInputFields();

        session()->flash('message', 'Treatment added successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';

    }
    public function render()
    {
        $treatments = Treatment::where('patient_id', $this->patientId)->get();
        return view('livewire.treatments', compact('treatments'));
    }
}
