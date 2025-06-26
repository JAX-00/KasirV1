<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as ModelUser;

class User extends Component
{
    public $ChoseMenu = 'see';
    public $name;
    public $email;
    public $role;
    public $password;

    public function save()
    {
        // make validation
        $this->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'role' => 'required',
            'password' => 'required'
        ], [
            // Show massage if the condition not met
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Format should be an email address',
            'email.unique' => 'The email is already registered',
            'role.required' => 'Role is required',
            'password.required' => 'Password is required',
        ]);
        $save = new ModelUser();
        $save->name = $this->name;
        $save->email = $this->email;
        $save->password = bcrypt($this->role);
        $save->role = $this->role;
        $save->save();

        $this->reset(['name', 'email', 'role', 'password']);
        $this->ChoseMenu = 'see';
    }


    public function choseMenu($menu)
    {
        $this->ChoseMenu = $menu;
    }
    public function render()
    {
        return view('livewire.user')->with([
            'allusers' => ModelUser::all()
        ]);
    }
}
