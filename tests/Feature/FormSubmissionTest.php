<?php

namespace Tests\Feature;

use App\Http\Livewire\FormWithBasicValidation;
use App\Http\Livewire\FormWithRealTimeValidation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function check_if_livewire_components_is_loaded_in_the_route_visited()
    {
        $this->get('/')
            ->assertSeeLivewire('form-with-basic-validation')
            ->assertSeeLivewire('form-with-real-time-validation')
            ->assertSeeLivewire('input-on-focus-out-validation')
            ->assertSeeLivewire('on-submit-validation');
    }

    /** @test */
    public function name_field_is_required()
    {
        Livewire::test(FormWithBasicValidation::class)
            ->set('name', null)
            ->call('sendMessage')
            ->assertHasErrors(['name' => 'required'])
            ->set('name', 'John Doe')
            ->call('sendMessage')
            ->assertHasNoErrors('name');
    }

    /** @test */
    public function name_field_value_must_be_at_least_six_characters()
    {
        Livewire::test(FormWithRealTimeValidation::class)
            ->set('name', 'John')
            ->call('sendMessage')
            ->assertHasErrors(['name' => 'min'])
            ->set('name', 'John Doe')
            ->call('sendMessage')
            ->assertHasNoErrors(['name' => 'min']);
    }

    /** @test */
    public function email_field_is_required_and_must_be_valid_one()
    {
        Livewire::test(FormWithRealTimeValidation::class)
            ->set('email', '')
            ->call('sendMessage')
            ->assertHasErrors(['email' => 'required'])
            ->set('email', 'john')
            ->call('sendMessage')
            ->assertHasErrors(['email' => 'email'])
            ->set('email', 'john@example.com')
            ->call('sendMessage')
            ->assertHasNoErrors(['email']);
    }

    /** @test */
    public function phone_field_is_required()
    {
        Livewire::test(FormWithBasicValidation::class)
            ->set('phone', null)
            ->call('sendMessage')
            ->assertHasErrors(['phone' => 'required'])
            ->set('phone', '1212121212')
            ->call('sendMessage')
            ->assertHasNoErrors('phone');
    }

    /** @test */
    public function message_field_is_required()
    {
        Livewire::test(FormWithBasicValidation::class)
            ->set('message', null)
            ->call('sendMessage')
            ->assertHasErrors(['phone' => 'required'])
            ->set('message', 'This is a simple message')
            ->call('sendMessage')
            ->assertHasNoErrors('message');
    }

    /** @test */
    public function contact_information_will_be_stored_on_successful_submission()
    {
        $payload = [
            'name'    => $this->faker->name,
            'email'   => $this->faker->email,
            'phone'   => $this->faker->phoneNumber,
            'message' => $this->faker->paragraph
        ];

        Livewire::test(FormWithBasicValidation::class)
            ->fill($payload)
            ->call('sendMessage')
            ->assertSee('Thank you. We will contact you soon.');

        $this->assertDatabaseHas('contacts', $payload);
    }
}
