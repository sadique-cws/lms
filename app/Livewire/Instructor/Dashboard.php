<?php

namespace App\Livewire\Instructor;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin')]
#[Title('Instructor Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.instructor.dashboard');
    }
}
