<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @livewire('patients.new-movement-modal', ['patientId' => $patient->id])

    @livewire('patients.movement-history-modal', ['patientId' => $patient->id])

</div>
