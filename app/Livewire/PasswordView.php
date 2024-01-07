<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordView extends Component
{
    public $value, $lihat = false;

    public function mount($value) {
        $this->value = $value;
    }

    public function lihatdong() {
        $this->lihat = !$this->lihat;
    }

    public function render()
    {
        return view('livewire.password-view');
    }
}
