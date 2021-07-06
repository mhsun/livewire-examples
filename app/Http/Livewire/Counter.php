<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $message = "";

    public function increment()
    {
        $this->count++;
        $this->checkForMessage();
    }

    public function decrement()
    {
        $this->count--;
        $this->checkForMessage();
    }

    private function checkForMessage()
    {
        if ($this->count % 10 == 0) {
            $this->message = "You have reached $this->count";
        } else {
            $this->message = "";
        }
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
