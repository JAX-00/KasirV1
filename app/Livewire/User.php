<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as ModelUser;

class User extends Component
{
    public $ChoseMenu = 'see';
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
