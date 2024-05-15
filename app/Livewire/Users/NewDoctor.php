<?php

namespace App\Livewire\Users;

use App\Mail\NewDoctorRegistrationNotification;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class NewDoctor extends Component
{
    public $newDoctorModal_isOpen = false;

    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|in:male,female,other')]
    public $gender;

    #[Validate('required|digits:10')]
    public $phone;

    #[Validate('required|string|min:3')]
    public $address;

    #[Validate('required|date')]
    public $dob;


    public function render()
    {
        return view('livewire.users.new-doctor');
    }

    public function registerNewUser()
    {
        $this->validate();

        // generate random password
        $pwd =  substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 8)), 0, 8);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,
            'dob' => $this->dob,
            'password' => Hash::make($pwd),
        ]);
        $this->reset();

        noty()->addSuccess('Doctor details added successfully');

        Doctor::create([
            'user_id' => $user->id
        ]);

        $this->sendNotificationEmail($user, $pwd);
    }

    public function sendNotificationEmail($user, $pwd)
    {
        Mail::to($user->email)->send(new NewDoctorRegistrationNotification($pwd));
    }
}
