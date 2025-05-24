<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Title('Student Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.student.dashboard');
    }
}
