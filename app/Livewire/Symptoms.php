<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;
use App\Models\Symptom;
use App\Models\User;

class Symptoms extends Component
{
    public $patientId;
    public $description;

    protected $rules = [
        'description' => 'required|string|max:255',
    ];

    public function mount($user)
    {
        $this->patientId = User::find($user)->id;
    }

    public function saveSymptom()
    {
        $this->validate();

        Symptom::create([
            'patient_id' => $this->patientId,
            'description' => $this->description,
        ]);

        $this->description = '';

        session()->flash('message', 'Symptom added successfully.');
    }

    public function render()
    {
        $symptoms = Symptom::where('patient_id', $this->patientId)->get();
        return view('livewire.symptoms',
            [
                'symptoms' => $symptoms
            ]);
    }
}
