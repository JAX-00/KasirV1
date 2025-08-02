<?php

namespace App\Livewire;

use App\Models\Product as ModelProduct;
use Livewire\Component;

class Produk extends Component
{
    public $ChoseMenu = 'see';
    public $name;
    public $email;
    public $role;
    public $password;
    public $choseProduct;

    public function chooseEdit($id)
    {
        $this->choseProduct = ModelUser::findOrFail($id);
        $this->name = $this->choseProduct->name;
        $this->email = $this->choseProduct->email;
        $this->role = $this->choseProduct->role;
        $this->ChoseMenu = 'edit';
    }

    public function update()
    {
        // make validation
        $this->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $this->choseProduct->id],
            'role' => 'required',
        ], [
            // Show massage if the condition not met
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Format should be an email address',
            'email.unique' => 'The email is already registered',
            'role.required' => 'Role is required',
        ]);
        $save = $this->choseProduct;
        $save->name = $this->name;
        $save->email = $this->email;
        $save->role = $this->role;
        $save->save();
        if ($this->password) {
            $save->password = bcrypt($this->password);
        }
        $this->reset(['name', 'email', 'role', 'choseProduct']);
        $this->ChoseMenu = 'see';
    }

    public function chooseDelete($id)
    {
        $this->choseProduct = ModelUser::findOrFail($id);
        $this->ChoseMenu = 'delete';
    }

    public function delete()
    {
        $this->choseProduct->delete();
        $this->reset();
    }

    public function cancel()
    {
        $this->reset();
    }

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
        return view('livewire.produk')->with(['allProduct' => ModelProduct::all()]);
    }
}
