<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- clinical records <br>
    -- each record can have: <br>
        symptoms, complaint, diagnoses, lab-tests, treaments --}}
        @livewire('symptoms',['user'=>$user->patient->id])
        @livewire('diagnoses',['user'=>$user->patient->id])
        @livewire('lab-tests',['user'=>$user->patient->id])
        @livewire('treatments',['user'=>$user->patient->id])
</div>
