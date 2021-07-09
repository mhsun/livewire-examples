<?php

namespace Tests\Feature;

use App\Http\Livewire\DependentDropdown;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DependentDropdownTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visited_route_has_livewire_components()
    {
        $this->get('/')
            ->assertSeeLivewire('dependent-dropdown');
    }

    /** @test */
    public function no_task_will_be_loaded_until_user_is_selected()
    {
        $user = User::factory()->create();

        $tasks = Task::factory()->forUser($user)->count(5)->create();

        Livewire::test(DependentDropdown::class)
            ->set('selectedUserId', 0)
            ->assertSee('No Task Found')
            ->set('selectedUserId', $user->id)
            ->assertSee($tasks->random()->title);
    }
}
