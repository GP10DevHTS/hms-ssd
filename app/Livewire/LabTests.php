<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LabTest;
use App\Models\User;

class LabTests extends Component
{
    public $patientId;
    public $name;
    public $result;

    protected $rules = [
        'name' => 'required|string|max:255',
        'result' => 'required|string|max:255',
    ];

    public function mount($user)
    {
        $this->patientId = User::find($user)->id;
    }

    public function saveLabTest()
    {
        $this->validate();

        LabTest::create([
            'patient_id' => $this->patientId,
            'name' => $this->name,
            'result' => $this->result,
        ]);

        $this->resetInputFields();

        session()->flash('message', 'Lab test added successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->result = '';
    }
    public function render()
    {
        $labTests = LabTest::where('patient_id', $this->patientId)->get();
        return view('livewire.lab-tests', compact('labTests'));
    }
}
