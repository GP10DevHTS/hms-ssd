<div class="p-6 bg-white rounded-lg shadow-md ">
    <h2 class="text-xl font-semibold mb-4">Treatments</h2>

    <form wire:submit.prevent="saveTreatment" class="mb-4">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Treatment Name:</label>
            <input type="text" id="name" wire:model="name" class="form-input mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror">
            @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="description" wire:model="description" class="form-textarea mt-1 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('description') border-red-500 @enderror"></textarea>
            @error('description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Save Treatment</button>
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
    <div class="p-6 bg-white rounded-lg shadow-md">
    {{-- <h3 class="text-lg font-semibold mt-6">Treatments</h3> --}}
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Description</th>
                    <th class="px-4 py-2 text-left">Treatment Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($treatments as $treatment)
                    <tr class="border border-gray-200">
                        <td class="px-4 py-2">{{ $treatment->name }}</td>
                        <td class="px-4 py-2">{{ $treatment->description }}</td>
                        <td class="px-4 py-2">{{ $treatment->treatment_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-2 text-gray-500" colspan="2">No treatments available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
</div>