<div>
    {{-- <a href="#" class="text-sm text-blue-500 " wire:click="bookAppointment()">Book Appointment</a> --}}
    <x-dialog-modal wire:model="bookAppointmentModal_isOpen">
        <x-slot name="title">
            {{ __('Book Appointment') }}
        </x-slot>

        <x-slot name="content">
            <x-form-section submit="">
                <x-slot name="title">
                    {{ __('Book Appointment') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Book an appointment for your patient.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-label for="department_id" value="{{ __('Department') }}" />
                        <select id="department_id" class="mt-1 block w-full" wire:model.defer="department_id">
                            <option value="">Select Department</option>
                            {{-- @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach --}}
                        </select>
                        <x-input-error for="department_id" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                        <x-label for="start_time" value="{{ __('Start Time') }}" />
                        <x-input id="start_time" type="datetime-local" class="mt-1 block w-full" wire:model.defer="start_time" />        
                        <x-input-error for="start_time" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                        <x-label for="reason" value="{{ __('Reason') }}" />
                        <x-input id="reason" type="text" class="mt-1 block w-full" wire:model.defer="reason" />        
                        <x-input-error for="reason" class="mt-2" />
                    </div>
                </x-slot>

            </x-form-section>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('bookAppointmentModal_isOpen', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="bookAppointment" wire:loading.attr="disabled">
                {{ __('Book') }}
            </x-button>

        </x-slot>
    </x-dialog-modal>
</div>