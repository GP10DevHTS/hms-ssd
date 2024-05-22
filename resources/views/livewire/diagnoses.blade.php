<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Diagnoses for Patient ID: {{ $patientId }}</h2>

    <form wire:submit.prevent="saveDiagnosis" class="mb-4">
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Diagnosis Description:</label>
            <textarea id="description" class="form-textarea mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('description') border-red-500 @enderror" name="description" required wire:model.defer="description"></textarea>
            @error('description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="doctor_diagnosis" class="block text-sm font-medium text-gray-700">Doctor Diagnosis:</label>
            <textarea id="doctor_diagnosis" class="form-textarea mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('doctor_diagnosis') border-red-500 @enderror" name="doctor_diagnosis" wire:model.defer="doctor_diagnosis"></textarea>
            @error('doctor_diagnosis') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Add Diagnosis</button>
    </form>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-2" data-dismiss="alert" aria-label="Close">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path fill-rule="evenodd" d="M14.354 5.646a.5.5 0 0 1 .708.708L10.707 10l4.355 4.354a.5.5 0 1 1-.708.708L10 10.707l-4.354 4.355a.5.5 0 0 1-.708-.708L9.293 10 4.646 5.646a.5.5 0 0 1 .708-.708L10 9.293l4.354-4.354z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    @endif

    <h3 class="text-lg font-semibold mt-6">Diagnoses</h3>
    <ul>
        @forelse ($diagnoses as $diagnosis)
            <li class="py-2 border-b border-gray-200">
                <span class="block text-sm">{{ $diagnosis->description }}</span>
                <span class="block text-xs text-gray-500">(Added on: {{ $diagnosis->created_at->format('M d, Y') }})</span>
                @if($diagnosis->doctor_diagnosis)
                    <span class="block text-sm">{{ $diagnosis->doctor_diagnosis }}</span>
                    <span class="block text-xs text-gray-500">(Added on: {{ $diagnosis->created_at->format('M d, Y') }})</span>
                @endif
            </li>
        @empty
            <li class="py-2">No diagnoses available.</li>
        @endforelse
    </ul>
</div>
