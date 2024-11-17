<?php

namespace App\Livewire\Admin\Partner;

use Livewire\Component;

class Index extends Component
{
    public $title = "Partner";

    public function render()
    {
        return view('livewire.admin.partner.index');
    }
}
