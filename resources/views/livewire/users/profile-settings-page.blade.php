<div class="max-w-lg mx-auto mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Card for showing user roles --}}
    <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-md">
        <label class="block text-sm font-medium font-bold text-gray-700 dark:text-gray-300">User Roles:</label>
        @forelse($user->roles as $role)
            <div class="flex items-center mt-1 text-sm text-gray-900 dark:text-gray-300">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span>{{ $role->name }}</span>
                <button wire:confirm="Are you sure you want to remove this role?"
                    wire:click="removeRole('{{ $role->id }}')"
                    class="ml-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600 focus:outline-none">
                    Remove
                </button>
            </div>
        @empty
            <p class="mt-1 text-sm text-gray-900 dark:text-gray-300">No Roles</p>
        @endforelse
    </div>


    {{-- Card for assigning new roles --}}
    <div class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-md">
        <form wire:submit.prevent="updateUserRoles">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assign New Roles:</label>
                @foreach ($roles->reject(function ($role) use ($user) {
        return $user->hasRole($role->name);
    }) as $role)
                    <div class="mt-1">
                        <input type="checkbox" id="role_{{ $role->id }}" wire:model="selectedRoles"
                            value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <label for="role_{{ $role->id }}"
                            class="ml-2 block text-sm text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                    </div>
                @endforeach
                @error('selectedRoles')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Assign Roles
            </button>
        </form>
    </div>
</div>
