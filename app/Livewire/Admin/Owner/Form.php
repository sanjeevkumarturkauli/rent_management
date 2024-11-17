<?php

namespace App\Livewire\Admin\Owner;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Form extends Component
{
    #[Layout('layouts.app')]

    public $title = "Owner Form";

    public function render()
    {
        return view('livewire.admin.owner.form');
    }
}
