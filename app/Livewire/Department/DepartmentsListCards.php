<?php

namespace App\Livewire\Department;

use App\Models\Department;
use Livewire\Component;

class DepartmentsListCards extends Component
{
    public function render()
    {
        return view('livewire.department.departments-list-cards',[
            'departments' => Department::all()
        ]);
    }
}
