<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ProfileSettingsPage extends Component
{
    public $user;

    public $selectedRoles = [];

    public function mount($user)
    {
        $this->user = User::find($user);
    }

    public function render()
    {
        return view(
            'livewire.users.profile-settings-page',
            [
                'roles' => Role::all(),
            ]
        );
    }

    public function updateUserRoles()
    {
        try {
            // Find the user
            $user = User::find($this->user->id);
            $roles = Role::whereIn('id', $this->selectedRoles)->get();
            $user->assignRole($roles);

            noty()->addSuccess('User roles updated successfully.');
        } catch (\Exception $e) {
            // noty()->addError($e->getMessage());
            noty()->addError('Failed to update user roles. Please try again.');
        }
    }

    public function removeRole($roleId)
    {
        try {
            $role = Role::find($roleId);
            $this->user->removeRole($role);
            noty()->addSuccess('Role removed successfully');
        } catch (\Exception $e) {
            noty()->addError($e->getMessage());
        }
    }
}
