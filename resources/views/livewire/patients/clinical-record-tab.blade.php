<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- clinical records <br>
    -- each record can have: <br>
        symptoms, complaint, diagnoses, lab-tests, treaments --}}
        @livewire('symptoms',['user'=>$user->patient->id])
        <hr>
        @livewire('diagnoses',['user'=>$user->patient->id])
        <hr>
        @livewire('lab-tests',['user'=>$user->patient->id])
        <hr>
        @livewire('treatments',['user'=>$user->patient->id])
</div>
