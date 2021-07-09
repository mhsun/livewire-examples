<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DependentDropdown extends Component
{
    /**
     * @var Collection
     */
    public Collection $users;

    /**
     * @var Collection
     */
    public $tasks = [];

    /**
     * @var int
     */
    public int $selectedUserId = 0;

    public function mount()
    {
        $this->users = User::all(['id', 'name']);
    }

    public function updatedSelectedUserId(int $id)
    {
        if ($id) {
            $this->tasks = Task::whereUserId($id)->get(['id', 'title']);
        } else {
            $this->tasks = [];
        }
    }

    public function render()
    {
        return view('livewire.dependent-dropdown');
    }
}
