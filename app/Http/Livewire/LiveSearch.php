<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class LiveSearch extends Component
{
    /**
     * @const
     */
    const FETCH_LIMIT = 5;

    /**
     * @var
     */
    public $tasks = [];

    /**
     * @var string
     */
    public $search = "";

    /**
     * @param string $option
     */
    public function getMatchedTasks()
    {
        $this->tasks = Task::where('title', 'like', "%{$this->search}%")->limit(self::FETCH_LIMIT)->get();
    }

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $this->tasks = [];
        } else {
            $this->getMatchedTasks();
        }
    }

    public function render()
    {
        return view('livewire.live-search');
    }
}
