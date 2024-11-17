<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]

    public $title = "Dashboard";

    public function render()
    {
        return view('livewire.admin.index');
    }
}
