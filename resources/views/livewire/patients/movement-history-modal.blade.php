<div wire:poll>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="overflow-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Room</th>
                    <th class="py-2">Ward</th>
                    <th class="py-2">Moved In At</th>
                    <th class="py-2">Ended At</th>
                    <th class="py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movementHistory as $movement)
                    <tr>
                        <td class="py-2">{{ $movement->room->name }}</td>
                        <td class="py-2">{{ $movement->room->ward->name }}</td>
                        <td class="py-2">{{ $movement->moved_in_at }}</td>
                        <td class="py-2">
                            {{ $movement->moved_out_at ? $movement->moved_out_at : 'Still in room' }}
                        </td>
                        <td class="py-2">
                            {{-- @if (!$movement->moved_out_at)
                                <x-button wire:confirm="are you sure" wire:click="endSession({{ $movement->id }})"
                                    {{ $movement->moved_out_at ? 'disabled' : '' }}
                                    class="{{ $movement->moved_out_at ? 'bg-gray-400 cursor-not-allowed' : '' }}">
                                    {{ __('End Session') }}
                                </x-button>
                            @endif --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
