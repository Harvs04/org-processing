<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserCreate extends Component
{
    public $firstName;
    public $lastName;
    public $nickname;
    public $email;
    public $fblink;
    public $mobileNumber;
    public $role;
    public $password;
    public $confirmPassword;


    protected $rules = [
        'firstName' => 'required|min:2|max:50',
        'lastName' => 'required|min:2|max:50',
        'nickname' => 'required|min:2|max:50',
        'email' => 'required|email|min:3|max:50|unique:users,email|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
        'fblink' => 'required',
        'password' => 'required|min:8',
        'mobileNumber' => 'required|min:11|max:11',
        'confirmPassword' => 'required|same:password',
        'role' => 'required',
    ];

    protected $messages = [
        'firstName.required' => 'First name is required',
        'lastName.required' => 'Last name is required',
        'nickname.required' => 'Nickname is required',
        'email.required' => 'Email is required',
        'fblink.required' => 'Facebook link is required',
        'mobileNumber.required' => 'Mobile number is required',
        'password.required' => 'Password is required',
        'confirmPassword.required' => 'Confirmation password is required.',
        'confirmPassword.same' => 'Passwords do not match.',
        'role.required' => 'Role is required.'
    ];

    // real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create() 
    {
        // validate input
        $this->validate();
        
        if ($this->password === $this->confirmPassword) {   // valid input
            // Create new user
            $new = new User([
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'nickname' => $this->nickname,
                'email' => $this->email,
                'fb_profile' => $this->fblink,
                'mobile_number' => $this->mobileNumber,
                'role' => $this->role
            ]);
            $new->password = $this->password; // Ensure password is set
            $new->save();   

            // assign role to user
            $new->assignRole($this->role);
            session()->flash('success','User Created!');
            $this->clear();
        } else {
            session()->flash('fail', 'Passwords do not match!');
        }
    }

    public function clear() 
    {
        $this->firstName = "";
        $this->lastName = "";
        $this->nickname = "";
        $this->email = "";
        $this->fblink = "";
        $this->mobileNumber = "";
        $this->role = "";
        $this->password = "";
        $this->confirmPassword = "";
    }

    public function render()
    {
        return view('livewire.Admin.user-create');
    }
}
