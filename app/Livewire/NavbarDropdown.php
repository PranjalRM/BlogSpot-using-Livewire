<?php

namespace App\Livewire;

use Livewire\Component;

class NavbarDropdown extends Component
{
    public $isOpen = false;

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }
    
    public function render()
    {
        return view('livewire.navbar-dropdown');
    }
}
