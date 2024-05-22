<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Diagnosis;

class Diagnoses extends Component
{
    public $patientId;
    public $description;
    public $doctor_diagnosis;
    public $diagnosis_date;
    // public $doctor_id;

    protected $rules = [
        'description' => 'required|string|max:255',
        'doctor_diagnosis' => 'required|string|max:255',
    ];

    public function mount($user)
    {
        $this->patientId = User::find($user)->id;
        // doctor id should be the logged in doctor
        // $this->doctor_id = auth()->user()->id;
    }

    public function saveDiagnosis()
    {
        $this->validate();

        Diagnosis::create([
            'patient_id' => $this->patientId,
            // 'doctor_id' => $this->doctor_id,
            'description' => $this->description,
            'doctor_diagnosis' => $this->doctor_diagnosis,
            'diagnosis_date' => now(),

        ]);

        $this->description = '';

        session()->flash('message', 'Diagnosis added successfully.');
    }
    public function render()
    {
        $diagnoses = Diagnosis::where('patient_id', $this->patientId)->get();
        return view('livewire.diagnoses', compact('diagnoses'));
    }
}
