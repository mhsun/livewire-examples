<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class OnSubmitValidation extends Component
{
    /**
     * @var string
     */
    public $name = "";

    /**
     * @var string
     */
    public $email = "";

    /**
     * @var string
     */
    public $phone = "";

    /**
     * @var string
     */
    public $message = "";

    /**
     * Validation rules
     *
     * @var string[]
     */
    protected $rules = [
        'name'    => 'required|min:6',
        'email'   => 'required|email',
        'phone'   => 'required',
        'message' => 'required|min:10',
    ];

    /**
     * This method will be fired when user click the send message button
     *
     * @param void
     * @return void
     */
    public function sendMessage(): void
    {
        $formData = $this->validate();

        Contact::create($formData);

        session()->flash('success', 'Thank you. We will contact you soon.');

        $this->clearForm();
    }

    /**
     * This method is responsible for clearing the form
     *
     * @param void
     * @return void
     */
    private function clearForm()
    {
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->message = "";
    }

    /**
     * This method is responsible for rendering the view
     */
    public function render()
    {
        return view('livewire.on-submit-validation');
    }
}
