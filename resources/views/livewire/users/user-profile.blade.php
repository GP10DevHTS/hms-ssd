<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="p-5">
        {{-- Nothing in the world is as soft and yielding as water. --}}
        <div class="grid grid-cols-4 gap-4">

            @livewire('users.static-profile-card', ['user' => $user->id], key('users-static-profile-card-' . uniqid()))

            <div
                class="col-span-3 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700 px-0">
                <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 ">
                    @if ($isDoctor)
                        @include('layouts.partials.doctor_profile_nav')
                    @elseif ($isPatient)
                        @include('layouts.partials.patient_profile_nav')
                    @else
                        @include('layouts.partials.admin_profile_nav')
                    @endif
                </div>
                <div>
                    @if (request()->routeIs('users.profile'))
                        Profile
                        @if ($isPatient)
                            @livewire('patients.blood-group-details', ['patient' => $user->patient->id], key('patient-blood-group'))
                        @endif
                    @elseif (request()->routeIs('users.profile.settings'))
                        @livewire('users.profile-settings-page', ['user' => $user->id], key('users-profile-settings-page'))
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>