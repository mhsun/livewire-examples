<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    /**
     * @var int
     */
    public $count = 0;

    /**
     * This is responsible for showing a message
     *
     * @var string
     */
    public $message = "";

    /**
     * This method is responsible for incrementing the counter by one.
     *
     * @param void
     * @return void
     */
    public function increment()
    {
        $this->count++;
        $this->checkForMessage();
    }

    /**
     * This method is responsible for decrementing the counter by one.
     *
     * @param void
     * @return void
     */
    public function decrement()
    {
        $this->count--;
        $this->checkForMessage();
    }

    /**
     * This method is responsible for showing message when the reminder of count
     * is equal when it is mode by 10. This is just to demonstrate another use
     * of flashing message.
     *
     * @param void
     * @return void
     */
    private function checkForMessage()
    {
        if ($this->count % 10 == 0) {
            $this->message = "You have reached $this->count";
        } else {
            $this->message = "";
        }
    }

    /**
     * This method is responsible for rendering the component so that
     * it appears in the browser
     */
    public function render()
    {
        return view('livewire.counter');
    }
}
